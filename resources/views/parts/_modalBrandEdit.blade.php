<div class="modal fade" id="editModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button onclick="document.getElementById('id{{$brand->id}}').checked = false" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>




                <div class="modal-body">

                    @csrf


                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label for="name">Name:</label>
                                <input name="name" id="brand-name" value="{{$brand->name}}" type="text">

                            </td>

                            <td>

                                <label for="status"> Status:  </label>

                                    <select name="status" id="brand-status">
                                        <option disabled="">
                                            Select
                                        </option>
                                        <option

                                                @if($brand->status == 'active')

                                                selected='selected'
                                                @endif
                                                value="active">Active</option>
                                        <option
                                                @if($brand->status == 'inactive')

                                                selected='selected'
                                                @endif
                                                value="inactive">Inactive</option>
                                    </select>


                            </td>


                        </tr>

                    </table>





                </div>
                <div class="modal-footer">
                    <button onclick="document.getElementById('id{{$brand->id}}').checked = false"  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit"  name="action" value="update" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
