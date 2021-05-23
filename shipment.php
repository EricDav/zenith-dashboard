<div class="data-tables">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card card_border p-4">
            <h3 class="card__title">Your Shipments</h3>
            <div class="table-responsive">
              <div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="example_length"><label></label></div><table id="example" class="display dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                  <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Emp. Name: activate to sort column ascending" style="width: 291px;">Tracking Number</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Designation: activate to sort column descending" style="width: 443px;" aria-sort="ascending">Reciever Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Joining date: activate to sort column ascending" style="width: 216px;">Ship Date</th>
                      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Emp. Status: activate to sort column ascending" style="width: 234px;">Delivery Date</th>
                      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Emp. Status: activate to sort column ascending" style="width: 234px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($shipments as $shipment): ?>
                    <tr role="row" class="odd">
                        <td class=""><?=$shipment['tracking_id']?></td>
                        <td class="sorting_1"><?=$shipment['receiver_name']?></td>
                        <td><?=(explode(" ", $shipment['ship_date'])[0])?></td>
                        <td><span class="badge badge-success"><?=$shipment['delivery_date']?></span></td>
                        <td><a href="<?='/tracking/add?id=' . $shipment['id']?>"><button type="button" class="btn btn-primary">Update</button></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?php if (sizeof($shipments) == 0): ?>
                    <div style="text-align: center;font-size: 20px;"><b>You did not have any Shipments</b></div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>