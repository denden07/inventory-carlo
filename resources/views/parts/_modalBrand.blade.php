<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.brand.store')}}" method="post" >
                <div class="modal-body">

                    @csrf

                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label for="name">Name:</label>
                                <input required name="name[]" id="brand-name" type="text">

                            </td>


                            <td>

                                <label for="status"> Status:  </label>
                                <select required name="status[]" id="brand-status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </td>

                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>

                    </table>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="Add" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>