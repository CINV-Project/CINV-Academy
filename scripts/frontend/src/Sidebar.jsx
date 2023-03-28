import { h } from 'preact';
import { Link } from 'preact-router';
import { useState } from 'preact/hooks';

const Sidebar = () => {
  const [openSections, setOpenSections] = useState({ users: true});

  const toggleSection = (section) => {
    setOpenSections(prevState => ({
      ...prevState,
      [section]: !prevState[section]
    }));
  };

  return (
    <div className="tw-sidebar tw-bg-white tw-shadow tw-rounded-[4px] tw-text-white tw-w-[200px] tw-p-4">
      <ul className="tw-list-none tw-space-y-2 tw-p-0">
        <li>
          <button
            className="tw-flex tw-justify-between tw-items-center tw-w-full tw-p-[8px] tw-my-[8px] tw-bg-[rgba(29,167,179,0.9)] tw-border-none tw-rounded-[4px]"
            onClick={() => toggleSection('users')}
          >
            Users
            <span>{openSections.users ? '-' : '+'}</span>
          </button>
          {openSections.users && (
            <ul className="tw-list-none tw-pl-4 tw-space-y-1">
              <li>
                <Link className="tw-block tw-py-1 tw-hover:bg-[rgba(29,167,179,0.2)] tw-rounded" href="/dashboard/admin/students">
                  Students
                </Link>
              </li>
              <li>
                <Link className="tw-block tw-py-1 tw-hover:bg-[rgba(29,167,179,0.2)] tw-rounded" href="/dashboard/admin/instructors">
                  Instructors
                </Link>
              </li>
            </ul>
          )}
        </li>
        <li>
          <button
            className="tw-flex tw-justify-between tw-items-center tw-w-full tw-p-[8px] tw-my-[8px] tw-bg-[rgba(29,167,179,0.9)] tw-border-none tw-rounded-[4px]" >
            Courses
          </button>
        </li>
        <li>
          <button className="tw-flex tw-justify-between tw-items-center tw-w-full tw-p-[8px] tw-my-[8px] tw-bg-[rgba(29,167,179,0.9)] tw-border-none tw-rounded-[4px] tw-text-white tw-hover:no-underline">
            Approve Teachers
          </button>
        </li>
      </ul>
    </div>
  );
};

export default Sidebar;
