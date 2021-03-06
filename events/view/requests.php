<div class="divCenter">
	<?if($user->getNewEventsCount() > 0):?>
		<h1>Новые мероприятия</h1>
		<div>
		<?foreach($result['events'] as $request):?>
			<div class="request-holder" id='newevent<?=$request['id_event']?>' style="background-color: #242533;">
				<div class="request-deny"><input type="button" name="refuse" value="" class="cancelbtn request-deny-button" onclick="handleRequest('newevent', 'deny', <?=$request['id_event']?>)"></div>
				<div class="request-apply"><input type="button" name="apply" value="" class="button request-apply-button" onclick="handleRequest('newevent', 'apply', <?=$request['id_event']?>)"></div>
				<div>

					<div class="request-info">
						<div class="tooltip">
		            		<b class="tooltiptext" id="tooltip"><?=$request['event']?></b>
		    				<div class="request-from"><?=$request['event']?></div>
		    				<div class="request-detail">Уровень: <u><?=$request['level']?></u></div>
		    				<div class="request-detail">Дата: <u><?=get_date($request['date'])?><?if($request['date_end'] !== "0000-00-00"):?> - <?=get_date($request['date_end'])?><?endif?></u></div>
		    				<div class="request-detail"><?=$request['place']?></div>
		    				<div class="request-detail">Квота - <?=$request['quota']?></div>
						</div>
					</div>
					<div class = "user-info">
	    				<div style="display: inline-block; margin-left: 5px;">
                            <div style="border-width: 2px" class="avatar request-photo">
                                <img src="<?=getAvatarPath($request['photo'], $request['id_student'])?>" class="avatar-photo">
                            </div>
		    				<div style="display: inline-block;">
			    				<div class="request-from">
			    					<a href="/id<?=$request['id_student']?>"><?=$request['created_by']?></a>
			    				</div>
			    				<div class="request-faculty"><?=$request['faculty']?>, <?=$request['role']?></div>
			    			</div>
		    			</div>
	    				<hr style="margin-top: 10px">
    				</div>
				</div>
            </div>
		<?endforeach?>
		</div>
	<?else:?>
		<h4>Новых заявок нет.</h4>
	<?endif?>
</div>
