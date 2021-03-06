<h1 style="text-align:center"><?=$result['event']['name']?></h1>
    <div class="input-group" style=" text-align:center; margin:auto; border-radius:5%">
        <table border=1 style="margin: 20px auto; width:100%;" class="table">
        <tr>
            <td style="width: 40%">
                Название мероприятия: 
            </td>
            <td style="width: 60%">
                <?=$result['event']['name']?>
            </td>
        </tr>
        <tr>
            <td>
                Уровень мероприятия: 
            </td>
            <td>
                <?=$result['event']['level_name']?>
            </td>
        </tr>
        <tr>
            <td>
                Квота: 
            </td>
            <td>
                <?=$result['event']['quota']?>
            </td>
        </tr>
        <tr>
            <td>
                Дата: 
            </td>
            <td>
                <?=get_date($result['event']['date'])?><?if($result['event']['date_end'] !== "0000-00-00"):?> - <?=get_date($result['event']['date_end'])?><?endif?>
            </td>
        </tr>
        <tr>
            <td>
                Организатор/ответственный с ЛГТУ
            </td>
            <td>
                <?if(isset($result['event']['idOrg'])):?><a href="/id<?=$result['event']['idOrg']?>"><?=$result['event']['fioOrg']?></a><?elseif(isset($result['event']['idResp'])):?><a href="/id<?=$result['event']['idResp']?>"><?=$result['event']['fioResp']?><?endif?>
            </td>
        </tr>
        <tr>
            <td>
                Орг. группа: 
            </td>
            <td>
                <?foreach($result['orgGroup'] as $orgGroup):?>
                    <a href="/id<?=$orgGroup['id']?>"><?=$orgGroup['name']?></a><br>
                <?endforeach?>
            </td>
        </tr>
        <tr>
            <td>
                Помощники орг.группы: 
            </td>
            <td>
                <?foreach($result['orgGroupHelpers'] as $orgGroupHelpers):?>
                    <a href="/id<?=$orgGroupHelpers['id']?>"><?=$orgGroupHelpers['name']?></a><br>
                <?endforeach?>
            </td>
        </tr>
        <tr>
            <td>
                Участники: 
            </td>
            <td>
                <?foreach($result['participants'] as $participants):?>
                    <a href="/id<?=$participants['id']?>"><?=$participants['name']?></a><br>
                <?endforeach?>
            </td>
        </tr>
        </table>
        <?if($result['isResponsible'] || $user->getLevel() == 1):?>
            <input type="button" onclick="window.location.href='/events/edit<?=$result['event']['id_event']?>'" value="Изменить" class="button">
        <?endif?>
        <?if($user->getLevel() == 1):?>
            <br><br><input type="button" onclick="window.location.href='/events/delete<?=$result['event']['id_event']?>'" value="Удалить" class="button">
        <?endif?>
        <?if(!$result['checkedIn']):?>
            <br><br><input type="button" onclick="getElementById('chooseLevel').style.display='block'; getElementById('id_event').value='<?=$result['event']['id_event']?>'" value="Записаться на это мероприятие" class="button">
        <?endif?>
    </div>