@extends ('layouts.master')
@section('content')
@include('layouts.toasts')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Kategori</h4>
  <!-- Hoverable Table rows -->
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Data Kategori</h4>
      <button type="button" class="btn btn-primary"data-bs-toggle="modal"
      data-bs-target="#addCategoryModal">
        Tambah Kategori
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table id="datatable" class="table table-hover">
          <thead>
            <tr class="text-center">
              <th width="50px">#</th>
              <th >Nama</th>
              <th width="150px">Pilihan</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <!-- Query untuk membaca data dari tabel Database (webspp) -->
            @foreach($categories as $category)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{$category -> category_name}}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <button class="dropdown-item" data-bs-toggle="modal"
                    data-bs-target="#editCategory{{ $category->id }}">
                      <i class="bx bx-edit-alt me-2"></i> Edit
                    </button>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="dropdown-item"
                      onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">
                        <i class="bx bx-trash me-2"></i> Delete
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Hoverable Table rows -->
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.store')}}" method="POST" >
          @csrf
          <div>
            <label for="namaKategori" class="form-label">Nama Kategori</label>
            <input type="text" id="namaKategori" class="form-control" name="category_name"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Batal
            </button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->
@foreach($categories as $category)
<div class="modal fade" id="editCategory{{$category -> id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.update',$category -> id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="editCategoryName" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control"id="editCategoryName"
            name="category_name" value="{{ $category->category_name }}" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Batal
            </button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection