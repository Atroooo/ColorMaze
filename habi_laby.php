<center style="margin-top: 10vh;">

	<style type="text/css">
	.case{
		width: 50px;
		height: 50px;
		border-radius: 10px;
		margin-top: 10px;
		margin-right: 10px;
		margin: 2px 0px 2px 0px;
	}

	@keyframes switch{
		0%{
			opacity: 0;
		}
		50%{
			opacity: 1;
		}
		100%{
			opacity: 0;
		}
	}
	.animationperso{
		width: 50px;
		height: 50px;
		border-radius: 10px;
		margin-top: 10px;
		margin-right: 10px;
    	animation: flash 1s linear infinite;
    	margin: 2px 0px 2px 0px;
	}

	@keyframes flash{
    0%{
       opacity: 0;
    }
    50%{
       opacity: 1;
    }
    100%{
    	opacity: 0;
    }
}

	.direction{
        background : none;
        color: white;
        font-size: 150%;
        margin-top: 50px;
        margin : 0 5px 0 5px;
        border : 1px solid white;
        border-radius: 10px;
        width: 120px;
    }
	</style>

	<div class="modal fade" id="debut" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="position : absolute;left:-7%;color: black;">
  <div class="modal-dialog">
    <div class="modal-content" style="width : 150%;">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center;"></h5>
      </div>
      <div class="modal-body">
        <p>ARE YOU READY ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">GO</button>
      </div>
    </div>
  </div>
</div>

