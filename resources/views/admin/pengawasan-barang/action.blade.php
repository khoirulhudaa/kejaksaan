<div class="form-button-action">
    <a href="{{ route('admin.pengawasan_barang.edit', $id) }}" data-toggle="tooltip" class="btn btn-sm btn-icon btn-warning" data-original-title="Edit">
        <i class="fa fa-edit"></i>
    </a>
    <button type="button" data-toggle="tooltip" id="btn-delete" class="btn btn-sm btn-icon btn-danger" data-original-title="Delete" value="{{ $id }}">
        <i class="fa fa-trash-alt"></i>
    </button>
</div>