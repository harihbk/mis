

<li class="nav-item">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">



        <li class="nav-item">
            <a href="#"
            class="nav-link ">
                <p>Vendors</p>
            </a>
        </li>



        <li class="nav-item">
            <a href="#"
            class="nav-link ">
                <p>Users</p>
            </a>
        </li>



    </ul>
</li>










<li class="nav-item">
    <a href="#" class="nav-link ">
      <i class="nav-icon  fab fa-product-hunt"></i>
      <p>
        Products
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('categorys.index') }}"
                class="nav-link {{ Request::is('categorys*') ? 'active' : '' }}">
                    <p>Category</p>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ route('subcategories.index') }}"
                class="nav-link {{ Request::is('subcategories*') ? 'active' : '' }}">
                    <p>Subcategories</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('parentcategories.index') }}"
                class="nav-link {{ Request::is('parentcategories*') ? 'active' : '' }}">
                    <p>Parent Categories</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('childcategories.index') }}"
                class="nav-link {{ Request::is('childcategories*') ? 'active' : '' }}">
                    <p>Child Categories</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('products.index') }}"
                class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                    <p>Products</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('productPartNumbers.index') }}"
                class="nav-link {{ Request::is('productPartNumbers*') ? 'active' : '' }}">
                    <p>Product Part Numbers</p>
                </a>
            </li>

</ul>
</li>



<li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('specifications.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Specifications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('specificationTypes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Specification Types</p>
                </a>
              </li>

            </ul>
          </li>












