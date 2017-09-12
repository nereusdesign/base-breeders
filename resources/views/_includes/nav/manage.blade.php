<div class="side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.dashboard')}}" class="is-font-14">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Users
    </p>

    <ul class="menu-list">
      <li><a href="{{route('users.index')}}" class="is-font-14">Manage Users</a></li>
      <li><a href="{{route('roles.index')}}" class="is-font-14">Roles</a></li>
      <li><a href="{{route('permissions.index')}}" class="is-font-14">Permissions</a></li>
    </ul>

    <p class="menu-label">
      Breeders
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.breeders.dashboard')}}" class="is-font-14">Manage Breeders</a></li>
      <li><a href="{{route('manage.breeders.view')}}" class="is-font-14">View Breeder Listings</a></li>
      <li><a href="{{route('manage.breeders.add')}}" class="is-font-14">Add Listing</a></li>
    </ul>


    <p class="menu-label">
      Breed Information
    </p>
    <ul class="menu-list">
          <li><a href="{{route('breeds.index')}}" class="is-font-14">Breed Information</a></li>
          <li><a href="{{route('breeds.add')}}" class="is-font-14">Add New Breed</a></li>
    </ul>
    <p class="menu-label">
      News/Articles
    </p>
        <ul class="menu-list">
          <li><a href="{{route('editor.view')}}" class="is-font-14">View Posts</a></li>
          <li><a href="{{route('editor.add')}}" class="is-font-14">Add Post</a></li>
          <li><a href="{{route('editor.remove')}}" class="is-font-14">Remove Post</a></li>
          <li><a href="{{route('editor.feed')}}" class="is-font-14">RSS</a></li>
        </ul>



        <p class="menu-label">
          Front Page Pictures
        </p>
        <ul class="menu-list">
          <li><a href="{{route('hero.add')}}" class="is-font-14">Add Pictures</a></li>
          <li><a href="{{route('hero.view')}}" class="is-font-14">View Pictures</a></li>
        </ul>


  </aside>
</div>
