import "preact/debug";
import { h, render } from 'preact';
import { Router } from 'preact-router';
import { Login } from './Login';
import { Dashboard } from './Dashboard';
import { AdminDashboard } from './admin/Dashboard';
import { AdminDashboardStudent } from './admin/Student';
import { AdminDashboardInstructors } from './admin/Instructors';
import { LoginAdditional } from './LoginAdditional';
import { LoginType } from './LoginType';
import LoadingBar from 'react-top-loading-bar';
import { loadBarRef } from './utils';

const App = () => (
  <div class="cinvApp">
    <LoadingBar color="#46b8da" ref={loadBarRef} shadow={true} />
    <Router>
      <Login path="/login" />
      <LoginType path="/login/type" />
      <LoginAdditional path="/login/additional" />
      <Dashboard path="/dashboard" />
      <AdminDashboard path="/dashboard/admin" />
      <AdminDashboardStudent path="/dashboard/admin/students" />
      <AdminDashboardInstructors path="/dashboard/admin/instructors" />
      <Dashboard path="/dashboard/:role" />
      <Error type="404" default />
    </Router>
  </div>
)


const Error = ({ type, url }) => (
  <section class="error">
    <h2>Error {type}</h2>
    <p>It looks like we hit a snag.</p>
    <pre>{url}</pre>
  </section>
);
element = document.getElementById("preact-app");
if (element) {
  render(<App />, element);
}
