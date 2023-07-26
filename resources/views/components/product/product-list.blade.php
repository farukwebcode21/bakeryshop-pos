<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Product</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <table class="table" id="tableData">
                    <thead>
                    <tr class="bg-light">
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">
                    {{--Table Data--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
        async function getList() {
        showLoader();
        let res =await axios.get("/list-product");
        hideLoader();

        let tableData =$('#tableData');
        let tableList =$('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item, index){
        let row =`
            <tr>
                <td><img class="w-20" src="/${item['img_url']}" alt=""></td>
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                    <td>${item.unit}</td>
                <td>
                    <button data-id="${item.id}" class="btn edit btn-sm btn-outline-success">Edit</button>
                    <button data-id="${item.id}" class="btn delete btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            `
            tableList.append(row);
        });
        $('.edit').on('click', function(){
            let id =$(this).data('id');
            alert(id);
        });
        $('.delete').on('click', function(){
            let id =$(this).data('id');
            alert(id);
        });
        tableData.DataTable({
            order: [[0, 'desc']],
            lengthMenu: [5,10,15,20,25,30,35,40,45,50],
            language:{
                paginate:{
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            }
        });

    }
    getList();

</script>
