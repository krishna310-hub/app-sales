<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepickerjs/dist/datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>
        <form method="POST" action="<?php echo e(route('store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="container1">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        Please fill all the fields.
                    </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="row">

                    <div class="col text-black">
                        <h4 style="font-size: 18px;">Invoice Number</h4>
                        <br>
                        <div class="col" style="margin-top: 10px">
                            <select class="input2" name="invoiceNumber" id="invoiceNumber">
                                <option value="FO-001" data-cid="1">FO-001</option>
                                <option value="EL-002" data-cid="2">EL-002</option>
                                <option value="AP-003" data-cid="3">AP-003</option>
                                <option value="GA-004" data-cid="4">GA-004</option>
                            </select>
                        </div>
                    </div>

                    <div class="col text-black">
                        <h4 style="margin-left: 210px; font-size: 18px;">Date</h4>
                        <br>
                        <div style="position: relative; display: flex; align-items: center; margin-left: 210px;">
                            <input class="input2" name="invoiceDate" style="margin-right: 10px; margin-left: 5px; padding-left: 30px;" type="date">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col" style="margin-top: 30px">
                        <input class="input" type="text" name="customerName" placeholder="Name" >
                    </div>
                    <div class="col" style="margin-top: 10px">
                        <input class="input" type="text" name="customerEmail" placeholder="Mail" >
                    </div>
                    <div class="col" style="margin-top: 10px">
                        <input class="input" type="text" name="customerPhone" placeholder="Mobile Number" >
                    </div>
                    <div class="col" style="margin-top: 10px">
                        <select class="input" name="customerState">
                            <option value="">Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                        </select>
                    </div>

                </div>
                <br>
                <br><br>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Sub Total</th>
                                <th>Quantity</th>
                                <th>GST Percentage</th>
                                <th>GST Amount</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="salesTableBody">
                            <tr>
                                <td>✓</td>
                                <td>
                                    <select class="input2 product-select" style="margin-right: 10px; margin-left: 5px; padding-left: 10px;" name="product">
                                        <option value="" data-cid="0">Select Product</option>

                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($product->pid); ?>" data-cid="<?php echo e($product->cid); ?>" data-rate="<?php echo e($product->rate); ?>" data-gst="<?php echo e($product->gst); ?>"><?php echo e($product->product_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>

                                <td>
                                    <input type="text" name="subTotal" class="form-control" value="0.00">
                                </td>
                                <td>
                                    <input type="number" name="quantity" class="form-control custom-number-input" min="1" value="1">
                                </td>
                                <td>
                                    <input type="text" name="gstPercentage" class="form-control" value="0%">
                                </td>
                                <td>
                                    <input type="text" name="gstAmount" class="form-control" value="0.00">
                                </td>
                                <td>
                                    <input type="text" name="totalAmount" class="form-control" value="0.00">
                                </td>
                                <td>
                                    <div style="display: flex; justify-content: flex-end;">
                                        <button type="button" class="btn btn-danger btn-sm" style="margin-right: 5px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm addRow">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br><br>
                    <table style="margin-left: 200px; font-size: 20px;">
                        <tr>
                            <td style="font-weight: bold;">Product Cost<td>
                            <td class="col p-8"><input style="margin-left: 360px;" class="input3" name="productCost" id="" placeholder="₹0" readonly></td>
                        </tr>
                    </table>
                    <br>
                    <table style="margin-left: 200px; font-size: 20px;">
                        <tr>
                            <td style="font-weight: bold;">Total Gst<td>
                            <td class="col p-8"><input style="margin-left: 398px;" class="input3" name="totalGst" id="" placeholder="₹0" readonly></td>
                        </tr>
                    </table>
                    <br>
                    <table style="margin-left: 200px; font-size: 20px;">
                        <tr>
                            <td style="font-weight: bold;">Total Sales Value<td>
                            <td class="col p-8"><input style="margin-left: 326px;" class="input3" name="grandTotal" id="" placeholder="₹0" readonly></td>
                        </tr>
                    </table>

                    <div style="margin-left: 720px; margin-top: 50px;">
                        <button type="submit" class="btn btn-success" style="cursor: pointer;">Submit</button>
                        <button style="margin-left: 20px; cursor: pointer;" type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </div>
            <br><br><br>
        </form>
    </div>
</body>
</html>

<style>
    .custom-number-input {
            width: 60px;
    }
    h1{
        color: rgb(6, 134, 19);
        font-size: 30px;
        font-weight: bold;
    }
    p{
        font-size: 17px;
    }
    .container1{
        background-color: white;
        height: 700px;
        width: 1000px;
        padding: 50px;
        margin-top: 50px;
        margin-left: 300px;
        border-radius: 10px;
        border: 1px solid rgb(196, 150, 150);
        position: relative;
        overflow-x: auto;
        box-sizing: border-box;
    }

    .input {
        border: 2px solid transparent;
        width: 30em;
        height: 2.5em;
        padding-left: 0.8em;
        outline: none;
        overflow: hidden;
        background-color: #F3F3F3;
        border-radius: 10px;
        transition: all 0.5s;
    }
    .input:hover,
    .input:focus {
        border: 2px solid #4A9DEC;
        box-shadow: 0px 0px 0px 7px rgb(74, 157, 236, 20%);
        background-color: white;
    }

    /* input2 */
    .input2 {
        border: 2px solid transparent;
        width: 10em;
        height: 2.3em;
        padding-left: 0.8em;
        outline: none;
        overflow: hidden;
        background-color: #F3F3F3;
        border-radius: 5px;
        transition: all 0.5s;
    }
    .input2:hover,
    .input2:focus {
        box-shadow: 0px 0px 0px 3px rgb(74, 157, 236, 20%);
        background-color: white;
    }
    /* input3 */
    .input3 {
        border: 2px solid transparent;
        width: 10em;
        height: 2.5em;
        margin-left: 230px;
        padding-left: 0.8em;
        outline: none;
        overflow: hidden;
        background-color: #F3F3F3;
        border-radius: 10px;
        transition: all 0.5s;
    }
    .input3:hover,
    .input3:focus {
        border: 2px solid #4A9DEC;
        box-shadow: 0px 0px 0px 7px rgb(74, 157, 236, 20%);
        background-color: white;
    }
</style>

<script>

    jQuery(document).ready(function() {

        // Function to update total amount and input fields
        function updateProductDetails(row) {
            var selectedOption = row.find('select[name="product"] option:selected');
            var rate = parseFloat(selectedOption.data('rate'));
            var gst = parseFloat(selectedOption.data('gst').replace('%', ''));
            var quantity = parseInt(row.find('input[name="quantity"]').val());

            var subtotal = rate * quantity;
            var gstAmount = (subtotal * gst) / 100;
            var totalAmount = subtotal + gstAmount;

            row.find('input[name="subTotal"]').val(subtotal.toFixed(2)); // Update Subtotal input
            row.find('input[name="gstPercentage"]').val(gst + '%'); // Update GST Percentage input
            row.find('input[name="gstAmount"]').val(gstAmount.toFixed(2)); // Update GST Amount input
            row.find('input[name="totalAmount"]').val(totalAmount.toFixed(2)); // Update Total Amount input

            updateGrandTotal();
            updateProductCost();
            updateTotalGst();
        }

        // Update Grand Total function
        function updateGrandTotal() {
            var total = 0;
            jQuery('input[name="totalAmount"]').each(function() {
                total += parseFloat(jQuery(this).val());
            });
            jQuery('input[name="grandTotal"]').val('₹' + total.toFixed(2)); 
        }

        // Update Product Cost function
        function updateProductCost() {
            var totalSubTotal = 0;
            jQuery('input[name="subTotal"]').each(function() {
                totalSubTotal += parseFloat(jQuery(this).val());
            });
            jQuery('input[name="productCost"]').val('₹' + totalSubTotal.toFixed(2));
        }

        // Update Total GST function
        function updateTotalGst() {
            var totalGstAmount = 0;
            jQuery('input[name="gstAmount"]').each(function() {
                totalGstAmount += parseFloat(jQuery(this).val());
            });
            jQuery('input[name="totalGst"]').val('₹' + totalGstAmount.toFixed(2));
        }

        // Product select change event
        jQuery(document).on('change', 'select[name="product"]', function() {
            var row = jQuery(this).closest('tr');
            updateProductDetails(row);
        });

        // Quantity input change event
        jQuery(document).on('input', 'input[name="quantity"]', function() {
            var row = jQuery(this).closest('tr');
            updateProductDetails(row);
        });

        // Add Row button click event
        jQuery(document).on('click', '.addRow', function() {
            var newRow = jQuery(this).closest('tr').clone(); // Clone the current row
            newRow.find('select[name="product"]').val(''); // Clear the product select value
            newRow.find('input[name="quantity"]').val('1'); // Reset the quantity to 1
            newRow.find('input[name="subTotal"]').val('0.00'); // Reset Subtotal
            newRow.find('input[name="gstPercentage"]').val('0%'); // Reset GST Percentage
            newRow.find('input[name="gstAmount"]').val('0.00'); // Reset GST Amount
            newRow.find('input[name="totalAmount"]').val('0.00'); // Reset Total Amount

            // Append the new row to the table body
            jQuery('#salesTableBody').append(newRow);
        });

        // Delete Row button click event
        jQuery(document).on('click', '.btn-danger', function() {
            var row = jQuery(this).closest('tr');
            row.remove();
        });

    });

    // function for filtering using Invoice Number
    $(document).ready(function(){

        function filterProductsByCID(cid) {
        $('.product-select').find('option').each(function() {
            if (cid !== 4 && $(this).data('cid') !== cid && $(this).data('cid') !== 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
        $('.product-select').val('').trigger('change');
    }

    $('#invoiceNumber').change(function() {
        let selectedCID = $(this).find('option:selected').data('cid');
        filterProductsByCID(selectedCID);
    });

    $('#invoiceNumber').change();
});

</script>

<?php /**PATH C:\LProjects\app-sales\resources\views/sales.blade.php ENDPATH**/ ?>