<?php

namespace Valen\Project2\Tests;

use PHPUnit\Framework\TestCase;
use Valen\Project2\TaskManager;

class TaskManagerTest extends TestCase
{
    private TaskManager $taskManager;

    protected function setUp(): void
    {
        $this->taskManager = new TaskManager();
    }

    public function testAddTask(): void
    {
        $this->taskManager->addTask('Tâche 1');
        $tasks = $this->taskManager->getTasks();

        $this->assertCount(1, $tasks);
        $this->assertEquals('Tâche 1', $tasks[0]);
    }

    public function testRemoveTask(): void
    {
        $this->taskManager->addTask('Tâche 1');
        $this->taskManager->removeTask(0);

        $tasks = $this->taskManager->getTasks();
        $this->assertCount(0, $tasks);
    }

    public function testGetTasks(): void
    {
        $this->taskManager->addTask('Tâche 1');
        $this->taskManager->addTask('Tâche 2');

        $tasks = $this->taskManager->getTasks();
        $this->assertCount(2, $tasks);
        $this->assertEquals('Tâche 1', $tasks[0]);
        $this->assertEquals('Tâche 2', $tasks[1]);
    }

    public function testGetTask(): void
    {
        $this->taskManager->addTask('Tâche 1');
        $task = $this->taskManager->getTask(0);

        $this->assertEquals('Tâche 1', $task);
    }

    public function testRemoveInvalidIndexThrowsException(): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->taskManager->removeTask(999);
    }

    public function testGetInvalidIndexThrowsException(): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->taskManager->getTask(999);
    }

    public function testTaskOrderAfterRemoval(): void
    {
        $this->taskManager->addTask('Tâche 1');
        $this->taskManager->addTask('Tâche 2');
        $this->taskManager->addTask('Tâche 3');

        $this->taskManager->removeTask(0);

        $tasks = $this->taskManager->getTasks();
        $this->assertCount(2, $tasks);
        $this->assertEquals('Tâche 2', $tasks[0]);
        $this->assertEquals('Tâche 3', $tasks[1]);
    }
}
