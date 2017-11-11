<div class="container-fluid text-center">
<h3><?php echo $title; ?></h3>

    <table class="table table-striped table-responsive ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($contact_list as $item): ?>
            <tr>
                <td><?php echo $item->naam; ?></td>
                <td><?php echo $item->email; ?></td>
                <td>
                    <div class="btn-group">
                    <a href="#"  class="btn btn-default" role="button" data-toggle="tooltip" title="Edit">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="#"  class="btn btn-default" role="button" data-toggle="tooltip" title="Remove">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<a href="#" class="btn btn-default" role="button" data-toggle="tooltip" title="New">
    <span class="fa fa-plus" aria-hidden="true"></span>
</a>
</div>