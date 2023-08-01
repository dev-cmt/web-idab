<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Role</h4>
                    @can('Role access')
                        <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-12 col-form-label" for="val-name">Role Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" id="val-name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Type role name.." value="{{ old('name', $role->name) }}">                                     
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary">Update Role</button>
                            </div>
                        </div>
                        <div class="pb-2">
                            <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="check-input">
                            <label for="management" class="check-label ml-2">Select All</label>
                        </div>
                        <div class="form-group row pl-4">
                            @foreach($permissions as $permission)
                            <div class="col-lg-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission{{$permission->id}}" value="{{ $permission->id}}" type="checkbox" class="form-check-input" @if(in_array($permission->id, $data)) checked @endif>
                                <label class="form-check-label" for="permission{{$permission->id}}">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>

                {{-- <div class="flex flex-wrap gap-6 mb-4">
                    <div class="lg:w-80 lg:mb-0 mb-2 px-6 py-4 rounded-md shadow-sm dark:bg-gray-800 bg-white">
                        <div class="border-b pb-2">
                            <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="management" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300 select-none">
                                Select All
                            </label>
                        </div>
                        <div class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox2" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox2" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-80 px-6 py-4 rounded-md shadow-sm dark:bg-gray-800 bg-white">
                        <div class="border-b pb-2">
                            <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="management" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300 select-none">
                                Select All
                            </label>
                        </div>
                        <div class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')"
                                    name="permissions[]"
                                    id="permission_checkbox"
                                    value="" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox2" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox2" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-80 px-6 py-4 rounded-md shadow-sm dark:bg-gray-800 bg-white">
                        <div class="border-b pb-2">
                            <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="management" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300 select-none">
                                Select All
                            </label>
                        </div>
                        <div class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')"
                                    name="permissions[]"
                                    id="permission_checkbox"
                                    value="" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                            <div class="ml-3 role-management-checkbox">
                                <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox2" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission_checkbox2" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                    Lorem Ipsum Dollar set <br>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>  
    </div>
</x-app-layout>

<script>
    $('#permission_all').on('click', function() {
        if ($(this).is(':checked')) {
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            // uncheck all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    // check permission by group
    function CheckPermissionByGroup(classname, checkthis) {
        const groupIdName = $("#" + checkthis.id);
        const classCheckBox = $('.' + classname + ' input');
        if (groupIdName.is(':checked')) {
            // check all the checkbox
            classCheckBox.prop('checked', true);
        } else {
            // uncheck all the checkbox
            classCheckBox.prop('checked', false);
        }
        implementallcheck();
    }
    function checksinglepermission(groupClassname, groupId, countTotalPermission) {
        const classCheckbox = $('.' + groupClassname + ' input');
        const groupIDCheckBox = $('#' + groupId);

        // if there is any occurance where somthing is not selected then make select check
        if ($('.' + groupClassname + ' input:checked').length == countTotalPermission) {
            groupIDCheckBox.prop('checked', true);
        } else {
            groupIDCheckBox.prop('checked', false);
        }
        implementallcheck();
    }

    function implementallcheck() {
        const countPermisssions = 5;
        const countPermisssionsGroup = 3;
        var amount = countPermisssions + countPermisssionsGroup;

        var checkbox = $("input:checked").length;

        if (amount == checkbox) {
            $('#permission_all').prop('checked', true);
        } else {
            $('#permission_all').prop('checked', false);
        }
    }
</script>