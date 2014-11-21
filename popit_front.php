
<div class="ficha">
   <img class="img-bio" src="<?= $aPerson->result->images[0]->url ?>">
   <div class="description">
	   <span class="name"><?= $aPerson->result->name ?></span>
	   <h4 class="profession"><?= $aPerson->result->personal_info[0]->profession;?></h4>
   </div>
</div>



<style type="text/css">
	.ficha{
		width: 100%;
		margin: 30px auto;
		text-align: center;
	}

	span.name{
		font-size: 20px;

	}

	h4{
		margin: 0;
		padding: 0;
	}

	.img-bio{

	}
</style>