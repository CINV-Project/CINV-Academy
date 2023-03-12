<style>
  #userDropdownMenu {
    display: none;
  }

  #userDropdown:hover #userDropdownMenu {
    display: block;
  }
</style>
<div id="userDropdown" class="tw-relative tw-h-[32px] tw-w-[32px] tw-float-right tw-mt-[8px]">
  <img type="button" class="tw-h-full tw-w-full tw-rounded-full" src="<?= $_SESSION['avatar'] ?>" alt="User dropdown">

  <!-- Dropdown menu -->
  <div id="userDropdownMenu" class="tw-absolute tw-left-[-75px] tw-z-10 tw-bg-white tw-rounded-md tw-shadow tw-w-[200px] tw-text-[16px]">
    <div class="tw-px-4 tw-py-3 tw-text-gray-900 tw-dark:text-white tw-truncate">
      <div><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></div>
      <div class="tw-truncate"><?= $_SESSION['email'] ?></div>
    </div>
    <ul class="tw-block tw-list-none tw-m-0 tw-p-0 tw-border-gray-200 tw-border-0 tw-border-solid tw-border-t-[1px] tw-border-b-[1px]" aria-labelledby="avatarButton">
      <li>
        <a data-native href="<?= base_path("dashboard") ?>" class="tw-block tw-px-4 tw-py-2 tw-hover:bg-gray-100 tw-dark:hover:bg-gray-600 tw-dark:hover:text-white">Dashboard</a>
      </li>
    </ul>
    <div class="tw-py-1">
      <a data-native href="<?= base_path("logout") ?>" class="tw-block tw-px-4 tw-py-2">Sign out</a>
    </div>
  </div>
</div>