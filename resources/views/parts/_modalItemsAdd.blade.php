<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="width: 80%" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.item.store')}}" method="post" >
                <div class="modal-body">

                    @csrf

                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label for="name">Name:</label>
                                <input required name="name[]" id="category-name" type="text">

                            </td>
                            <td>

                                <label for="category"> Category:  </label>
                                <select required name="category[]" id="category-status">
                                    <option selected="selected" disabled="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </td>


                            <td>

                                <label for="brand"> Brand:  </label>
                                <select required name="brand[]" id="category-status">
                                    <option selected="selected" disabled="">Select</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach

                                </select>
                            </td>

                            <td>
                                <label for="quantity">QTY:</label>
                                <input required name="quantity[]" id="category-name" type="text">

                            </td>

                            <td>
                                <label for="price">Price:</label>
                                <input required name="price[]" id="category-name" type="text">

                            </td>


                            <td>

                                <label for="status"> Status:  </label>
                                <select required name="status[]" id="category-status">
                                    <option disabled="">Select</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </td>

                            <td><button style="margin-top: 10px" type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
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