<div class="container">
    <div class="row">

        <div class="col-md-6"><h3>Products</h3>
        <table class="table table-hover">
        <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>&nbsp;</th>
                </tr>


                <?php foreach ($items as $item): ?>
                    <tr>
                    	<form action='<?=base_url()."user/index"?>' method='post'>
                    		<?=form_hidden('id',$item->id)?>
                    		<?=form_hidden('name',$item->name)?>
                    		
                    		<?=form_hidden('price',$item->price)?>

	                        <td><?= $item->id ?></td>
	                        <td><img src="<?=base_url().'images/'.$item->picpath?>" width = "50px" alt="..." class="img-thumbnail"></td>
	                        <td><?= $item->name ?></td>
	                        <td><input type="text" name='qty' size='1' value='<?=$item->qty?>'></td> 
	                        <td><?= $item->price ?></td>
	                        <td>
	                            <button name="submit" class ="btn btn-success">
	                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to Cart
	                            </button>
	                        </td>
                    	</form>
                    </tr>
                <?php endforeach; ?>
        </table>
        </div>



        <div class="col-md-6"><h3>Cart</h3>

        <?php echo form_open('user/index'); ?>
		<table class="table table-bordered">

		<tr>
		        <th>Quantity</th>
		        <th>Item Name</th>
		        <th style="text-align:right">Item Price</th>
		        <th style="text-align:right">Sub-Total</th>
		        <th>Remove Item?</th>
		</tr>

		<?php $i = 1; ?>

		<?php foreach ($this->cart->contents() as $cartItems): ?>

		        <?php echo form_hidden($i.'[rowid]', $cartItems['rowid']); ?>
		        <?php echo form_hidden($i.'[item_id]', $cartItems['id']); ?>

		        <tr>
		                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $cartItems['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
		                <td>
		                        <?php echo $cartItems['name']; ?>
		                </td>
		                <td style="text-align:right"><?php echo $this->cart->format_number($cartItems['price']); ?></td>
		                <td style="text-align:right">$<?php echo $this->cart->format_number($cartItems['subtotal']); ?></td>
		        
		                <td>
		                	<a class="btn btn-danger" href='<?=base_url()."user/index/delete/". $cartItems["rowid"] ?>' role="button">
				                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				            </a>

		                </td>
		        </tr>

		<?php $i++; ?>

		<?php endforeach; ?>

		<tr>
		        <td colspan="2"> </td>
		        <td class="right"><strong>Total</strong></td>
		        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>

		</table>

		<p>
		<?php echo form_submit('update', 'Update your Cart','class ="btn btn-info"'); ?>
		<?php echo form_submit('clear', 'Clear your Cart','class ="btn btn-warning"'); ?>
		<?php echo form_submit('order', 'Order Now','class ="btn btn-success"'); ?></p>
        </div>

        </div>
    </div>
</div>
>
</div>
