import { h } from 'preact';
import Sidebar from '../Sidebar';
export const AdminDashboard = ({ role }) => {
  return (
    <div class="tw-flex">
      <div className="tw-w-[300px]">
        <Sidebar />

      </div>
      <div className="tw-w-full">


        <h2>AdminDashboard</h2>
      </div>

    </div>
  )
}