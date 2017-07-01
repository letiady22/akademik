(function () {

    var tableColumns = [
        {
            name: 'id',
            sortField: 'id'
        },
        {
            name: 'title_id',
            sortField: 'title_id',
            title: 'Title'
        },
        {
            name: 'published_at',
            sortField: 'published_at'
        },
        {
            name: 'is_published',
            sortField: 'is_published'
        },
        {
            name: 'author'
        },
        {
            name: '__actions',
            dataClass: 'text-center',
        }  
    ];

    var posts = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': $('#token').attr('content')
            }
        },
        el: '#posts',
        data: {
            searchFor: '',
            fields: tableColumns,
            sortOrder: [{
                field: 'published_at',
                direction: 'desc'
            }],
            multiSort: true,
            perPage: 10,
            paginationComponent: 'vuetable-pagination',
            dataset: null,
            loading: true,
            itemActions: [
                { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-default', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} },
                { name: 'delete-item', label: '', icon: 'glyphicon glyphicon-remove', class: 'btn btn-danger', extra: {title: 'Delete', 'data-toggle':"tooltip", 'data-placement': "right" } }
            ],
            moreParams: []
        },
        events: {
            'vuetable:load-success': function(response) {
                this.dataset = response.data;
                this.title = this.dataset.data.name;
                this.description = this.dataset.data.content;
                this.loading = false;
            },
            'vuetable:action': function(action, data) {
                if (action == 'edit-item') {
                    window.load(
                        window.location.href = data.url_edit
                    );
                } else if (action == 'delete-item') {
                    var vm = this;
                    swal({
                        title: "Are you sure?",
                        type: 'warning',
                        text: "You will not be able to recover this imaginary file!",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function (isConfirm) {
                        if (isConfirm) {
                            setTimeout( function () {
                                vm.destroyById(data);
                            });
                        }
                    });
                }
            }
        },
        watch: {
            'perPage': function(val, oldVal) {
                this.$broadcast('vuetable:refresh');
            },
            'paginationComponent': function(val, oldVal) {
                this.$broadcast('vuetable:load-success', this.$refs.vuetable.tablePagination);
                this.paginationConfig(this.paginationComponent);
            }
        },
        methods: {
            destroyById: function (data) {
                this.$http({
                    method: 'DELETE',
                    url: data.url_delete
                }).then(function (res) {
                    swal('Deleted!',
                        'Your imaginary file has been deleted',
                        'success');
                    this.$broadcast('vuetable:refresh');
                }, function (res) {
                    if (res.status === 403) {
                        swal('403',
                            'This action is unauthorized',
                            'warning');
                    } else if (res.status === 500) {
                        swal('500',
                            'Internal server error',
                            'error');
                    }
                });
            },
            setFilter: function() {
                this.moreParams = [
                    'filter=' + this.searchFor
                ];
                this.$nextTick(function() {
                    this.$broadcast('vuetable:refresh');
                });
            },
            resetFilter: function() {
                this.searchFor = '';
                this.setFilter();
            },
            paginationConfig: function(componentName) {
                if (componentName == 'vuetable-pagination') {
                    this.$broadcast('vuetable-pagination:set-options', {
                        wrapperClass: 'pagination',
                        icons: { first: '', prev: '', next: '', last: ''},
                        activeClass: 'active',
                        linkClass: 'btn btn-default',
                        pageClass: 'btn btn-default'
                    });
                }
                if (componentName == 'vuetable-pagination-dropdown') {
                    this.$broadcast('vuetable-pagination:set-options', {
                        wrapperClass: 'form-inline',
                        icons: { prev: 'glyphicon glyphicon-chevron-left', next: 'glyphicon glyphicon-chevron-right' },
                        dropdownClass: 'form-control'
                    });
                }
            }
        }
    });

})();
