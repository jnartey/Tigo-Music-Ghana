<p>
    <strong><?php echo $this->request->data['Contact']['name']; ?> | CONTACT DETAILS</strong>
    <br />-------------------------------------------------------------------------------
    <br />
    Name: <?php echo $this->request->data['Contact']['name']; ?>
	<br />
    E-mail: <?php echo $this->request->data['Contact']['email']; ?>
    <br />
	Title: <?php echo $this->request->data['Contact']['subject']; ?>
    <br />
    Message: <?php echo $this->request->data['Contact']['message']; ?>
</p>