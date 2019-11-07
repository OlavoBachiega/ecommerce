<?php if(!class_exists('Rain\Tpl')){exit;}?><form method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">

	<!-- Campos obrigatórios -->
	<input type="hidden" name="receiverEmail" value="olavobachiega@yahoo.com.br">
	<input type="hidden" name="currency" value="BRL">

	<!-- Itens do pagamento (ao menos um item é obrigatório) -->
	<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
	<input type="hidden" name="itemId<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="itemDescription<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="itemAmount<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="itemQuantity<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="itemWeight<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["vlweigth"]*1000, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<?php } ?>
	
	<!-- Código de referência do pagamento no seu sistema (opcional) -->
	<input type="hidden" name="reference" value="<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<!-- Informações de frete (opcionais) -->
	<input type="hidden" name="shippingType" value="1">
	<input type="hidden" name="shippingAddressPostalCode" value="<?php echo htmlspecialchars( $order["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="shippingAddressStreet" value="<?php echo utf8_encode($order["desaddress"]); ?>">
	<input type="hidden" name="shippingAddressNumber" value="<?php echo utf8_encode($order["desnumber"]); ?>">
	<input type="hidden" name="shippingAddressComplement" value="<?php echo utf8_encode($order["descomplement"]); ?>">
	<input type="hidden" name="shippingAddressDistrict" value="<?php echo utf8_encode($order["desdistrict"]); ?>">
	<input type="hidden" name="shippingAddressCity" value="<?php echo utf8_encode($order["descity"]); ?>">
	<input type="hidden" name="shippingAddressState" value="<?php echo utf8_encode($order["desstate"]); ?>">
	<input type="hidden" name="shippingAddressCountry" value="<?php echo utf8_encode($order["descountry"]); ?>">

	<!-- Dados do comprador (opcionais) -->
	<input type="hidden" name="senderName" value="<?php echo utf8_encode($order["desperson"]); ?>">
	<input type="hidden" name="senderAreaCode" value="<?php echo htmlspecialchars( $phone["areaCode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="senderPhone" value="<?php echo htmlspecialchars( $phone["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	<input type="hidden" name="senderEmail" value="<?php echo htmlspecialchars( $order["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<!-- submit do form (obrigatório) 
	<input type="image" name="submit" alt="Pague com PagSeguro" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>
	-->
</form>
<script type="text/javascript">
	document.forms[0].submit();
</script>