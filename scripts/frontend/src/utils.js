import { createRef } from 'preact';
import jsonrpc from 'jsonrpc-lite';

export const loadBarRef = createRef();


const API_URL = '/api';

function generate_uuid() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
    var r = (Math.random() * 16) | 0,
      v = c == 'x' ? r : (r & 0x3) | 0x8;
    return v.toString(16);
  });
}


async function post(url, payload) {
  const response = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload),
  });

  return response.json();
}

async function rpcCall(method, params) {
  loadBarRef.current.continuousStart();
  payload = jsonrpc.request(generate_uuid(), method, params);
  result = await post(API_URL, payload);
  loadBarRef.current.complete();

  return result;
}

export async function loginUser(userData) {
  result = await rpcCall('user/login', { user: userData });
  localStorage.setItem('userId', result.id);

  return result;
}

export async function completeRegistration(role) {
  const id = localStorage.getItem('userId');
  const userData = { role, completed_registration: true };

  return rpcCall('user/update', { user: userData, id });
}

export async function createInstructor(instructor) {
  const user_id = localStorage.getItem('userId');

  return rpcCall('user/createInstructor', { instructor, user_id });
}
