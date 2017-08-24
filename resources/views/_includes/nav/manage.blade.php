<div class="side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.dashboard')}}">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      User/Permission Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}">Manage Users</a></li>
      <li>
        <a href="{{route('permissions.index')}}">Roles &amp; Permissions</a>
        <ul>
          <li><a href="{{route('roles.index')}}">Roles</a></li>
          <li><a href="{{route('permissions.index')}}">Permissions</a></li>
        </ul>
      </li>
    </ul>


    <p class="menu-label">
      Site Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('breeds.edit')}}">Edit Breed Information</a></li>
      <li>
        <a href="{{route('breeds.index')}}">Breed Information</a>
        <ul>
          <li><a href="{{route('breeds.add')}}">Add New Breed</a></li>
          <li><a href="{{route('breeds.delete')}}">Delete A Breed</a></li>
        </ul>
      </li>
    </ul>


  </aside>
</div>
