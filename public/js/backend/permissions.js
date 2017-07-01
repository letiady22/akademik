$(function() {

    function checkedToggle(id, args) {

        var idArg = $('#'+id);
        var collection = [];

        for (var i = 0; i < args.length; i++) {
            collection.push($('#'+args[i]));
        }

        idArg.change(function() {
            var checked = $(this).attr('checked');
            if (checked === undefined) {
                for (var x = 0; x < collection.length; x++) {
                    collection[x].removeAttr('checked');
                }
            } else {
                for (var y = 0; y < collection.length; y++) {
                    collection[y].attr('checked', 'checked');
                }
            }
            
        });
    }

    checkedToggle('posts', [
        'create_post',
        'read_post',
        'delete_post',
        'edit_post'
    ]);


    checkedToggle('projects', [
        'create_project',
        'read_project',
        'delete_project',
        'edit_project'
    ]);

    checkedToggle('services', [
        'create_service',
        'read_service',
        'delete_service',
        'edit_service'
    ]);

    checkedToggle('categories', [
        'create_category',
        'read_category',
        'delete_category',
        'edit_category'
    ]);

    checkedToggle('partners', [
        'create_partner',
        'read_partner',
        'delete_partner',
        'edit_partner'
    ]);

    checkedToggle('testimonials', [
        'create_testimoni',
        'read_testimoni',
        'delete_testimoni',
        'edit_testimoni'
    ]);

    checkedToggle('pages', [
        'create_page',
        'read_page',
        'delete_page',
        'edit_page'
    ]);


    checkedToggle('others', [
        'manage_menu'
    ]);

});