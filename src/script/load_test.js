import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '5m', target: 100 },
    ],
};

export default function () {
    http.get('http://127.0.0.1:8081');
    sleep(1);
}
