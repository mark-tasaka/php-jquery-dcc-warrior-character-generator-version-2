<!DOCTYPE html>
<html>
<head>
<title>Dungeon Crawl Classics Warrior Character Generator</title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Dungeon Crawl Classics Warrior Character Generator. Goblinoid Games.">
	<meta name="keywords" content="Dungeon Crawl Classics, Goblinoid Games,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2020">
    
    <link rel="icon" href="../../../../images/favicon/icon.png" type="image/png" sizes="16x16"> 
		

	<link rel="stylesheet" type="text/css" href="css/warrior.css">
	<link rel="stylesheet" type="text/css" href="css/warrior_post.css">
    
    
    <script type="text/javascript" src="./js/dieRoll.js"></script>
    <script type="text/javascript" src="./js/modifiers.js"></script>
    <script type="text/javascript" src="./js/hitPoinst.js"></script>
    <script type="text/javascript" src="./js/abilityScoreAddition.js"></script>
    <script type="text/javascript" src="./js/attackBonus.js"></script>
    <script type="text/javascript" src="./js/classAbilities.js"></script>
    
    
    
</head>
<body>
    
    <!--PHP-->
    <?php
    
    include 'php/armour.php';
    include 'php/checks.php';
    include 'php/weapons.php';
    include 'php/gear.php';
    include 'php/coins.php';
    include 'php/classDetails.php';
    include 'php/clothing.php';
    include 'php/abilityScoreGen.php';
    include 'php/randomName.php';
    
    /*
        if(isset($_POST["theCharacterName"]))
        {
            $characterName = $_POST["theCharacterName"];
    
        }
        */
        
        if(isset($_POST["theGender"]))
        {
            $gender = $_POST["theGender"];
        }
        
        $characterName = getRandomName($gender);

        $checkBoxVal = 0;
    /*
        if(isset($_POST["checkBoxRandomName"]))
        {
            $checkBoxVal = $_POST["checkBoxRandomName"];
    
        }

        if($checkBoxVal == 1)
        {
            $characterName = "";
            $characterName = getRandomName($gender);
        }*/

       // if()

        //$pcName = "";

        //getRandomName ($sex)


    

            
        if(isset($_POST["theAlignment"]))
        {
            $alignment = $_POST["theAlignment"];
        }
    
        if(isset($_POST["theLevel"]))
        {
            $level = $_POST["theLevel"];
        
        } 
    
        if(isset($_POST["theSavingThrows"]))
        {
            $saveThrowOption = $_POST["theSavingThrows"];
        
        } 
    
        
        if(isset($_POST["theAbilityScore"]))
        {
            $abilityScoreGen = $_POST["theAbilityScore"];
        
        } 
    
    $dieType = generationMethod ($abilityScoreGen)[0];
    $numberDie = generationMethod ($abilityScoreGen)[1];
    $dieRemoved = generationMethod ($abilityScoreGen)[2];
    $valueAdded = generationMethod ($abilityScoreGen)[3];
    
    $generationMessage = generationMesssage ($abilityScoreGen);
    
    
        if(isset($_POST["theArmour"]))
        {
            $armour = $_POST["theArmour"];
        }
    
        $armourName = getArmour($armour)[0];
        $armourDefense = getArmour($armour)[1];
        $armourWeight = getArmour($armour)[2];
    
    
        $totalAcDefense = $armourDefense;
    
        $armourDefense = removeZero($armourDefense);
        $armourWeight = removeZero($armourWeight);
    
    
        if(isset($_POST["theGold"]))
        {
            $coins = $_POST["theGold"];
        }
    
        $coinQuantity = getCoins($coins)[0];
        $coinType = getCoins($coins)[1];
        $coinQuantity2 = getCoins($coins)[2];
        $coinType2 = getCoins($coins)[3];
    
    
         
        $weaponArray = array();
        $weaponNames = array();
        $weaponDamage = array();
        $weaponWeight = array();
    
    
        if(isset($_POST["theWeapons"]))
        {
            foreach($_POST["theWeapons"] as $weapon)
            {
                array_push($weaponArray, $weapon);
            }
        }
    
    foreach($weaponArray as $select)
    {
        array_push($weaponNames, getWeapon($select)[0]);
    }
        
    foreach($weaponArray as $select)
    {
        array_push($weaponDamage, getWeapon($select)[1]);
    }
        
    $totalWeaponWeight = 0;
    
    foreach($weaponArray as $select)
    {
        array_push($weaponWeight, getWeapon($select)[2]);
        $totalWeaponWeight += getWeapon($select)[2];
    }
    
    

        $gearArray = array();
        $gearNames = array();
        $gearWeight = array();
    
    
        if(isset($_POST["theGear"]))
        {
            foreach($_POST["theGear"] as $weapon)
            {
                array_push($gearArray, $weapon);
            }
        }
    
        foreach($gearArray as $select)
        {
            array_push($gearNames, getGear($select)[0]);
        }
    
    $saveMatrix = savingThrowMatrix ($level);
    
    
    ?>

    
	
<!-- JQuery -->
  <img id="character_sheet"/>
   <section>
           
		<span id="strength"></span>
		<span id="agility"></span> 
		<span id="stamina"></span> 
		<span id="intelligence"></span>
		<span id="personality"></span>
       <span id="luck"></span>
       
       
           
		<span id="strengthMod"></span>
		<span id="agilityMod"></span> 
		<span id="staminaMod"></span> 
		<span id="intelligenceMod"></span>
		<span id="personalityMod"></span>
       <span id="luckMod"></span>
		  
       
       <span id="gender">
           <?php
           echo $gender;
           ?>
       </span>
       
       <span id="dieRollMethod"></span>

       
       <span id="class">Warrior</span>
       

       
       
      <!-- <span id="missileAttack"></span>-->
       
       
       <span id="fighterAbility"></span>
       

       <span id="descendingAc"></span> 
       <span id="ascendingAc"></span>
       
       <!--<span id="addLanguages"></span>-->
       
       <span id="hitPoints"></span>
       
       <!--<span id="hitDie"></span>-->
       
       <span id="singleSave">
           <?php
           
           if($saveThrowOption == 1)
           {
               echo singleSave ($level); 
           }
           else
           {
               echo "";
           }
           
           ?>
       </span>
       
       
              
       <span id="saveMatrix">
           <?php
           
           if($saveThrowOption == 1)
           {
               echo ""; 
           }
           else
           {
               echo $saveMatrix[0];
               echo "<br/>";
               echo $saveMatrix[1] - $dwarfSaveMagic;
               echo "<br/>";
               echo $saveMatrix[2];
               echo "<br/>";
               echo $saveMatrix[3];
               echo "<br/>";
               echo $saveMatrix[4] - $dwarfSaveMagic;
           }
           
           ?>
       </span>
       
              <span id="saveMatrixDes">
           <?php
           
           if($saveThrowOption == 1)
           {
               echo ""; 
           }
           else
           {
               echo "vs. Death/Poison";
               echo "<br/>";
               echo "vs. Wands/Rays";
               echo "<br/>";
               echo "vs. Paralyze/Stone";
               echo "<br/>";
               echo "vs. Dragon Breath";
               echo "<br/>";
               echo "vs. Spells/Staffs";
           }
           
           ?>
       </span>
       
        <span id="saveMatrixTitle">
           <?php
           
           if($saveThrowOption == 1)
           {
               echo ""; 
           }
           else
           {
               echo "Saving Throws";
           }
           
           ?>
       </span>
       
       <span id="level">
           <?php
                echo $level;
           ?>
        </span>
       

       
       <span id="characterName">
           <?php
                echo $characterName;
           ?>
        </span>
       
              
         <span id="alignment">
           <?php
                echo $alignment;
           ?>
        </span>

              
       <span id="armourName">
           <?php
                echo $armourName;
           ?>
        </span>
       
       
       <span id="weaponsList">
           <?php
           $val1 = 0;
           $val2 = 0;
           $val3 = 0;
           
           foreach($weaponNames as $theWeapon)
           {
               echo $theWeapon;
               echo "<br/>";
               $val1 = isWeaponTwoHanded($theWeapon, $val1);
               $val2 = isWeaponBastardSword($theWeapon, $val2);
           }
           
           $val3 = $val1 + $val2;
           
           $weaponNotes = weaponNotes($val3);
           
           ?>  
        </span>
       
       <span id="weaponNotes">
           <?php
                echo $weaponNotes;
           ?>
        </span>
            
       <span id="weaponsList2">
           <?php
           foreach($weaponDamage as $theWeaponDam)
           {
               echo $theWeaponDam;
               echo "<br/>";
           }
           ?>        
        </span>
       

       <span id="gearList">
           <?php
           
           foreach($gearNames as $theGear)
           {
              echo $theGear;
               echo "<br/>";
           }
           ?>
       </span>
           
       <span id="wealth">
           <?php
           
           if($coinQuantity === 0)
           {
               echo "";
           }
           else
           {
           echo ($coinQuantity * 10) . $coinType;
           echo "<br/>";
           echo ($coinQuantity2 * 10) . $coinType2;
               
           }
           ?>
       </span>
       
       <span id="coinWeight">
           <?php
               
           if($coinQuantity === 0)
           {
               echo "";
           }
           else
           {
                echo "Coin weight: " . ($coinQuantity+$coinQuantity2) . " lbs";
           }
           ?>
       </span>
       

       <span id="abilityScoreGeneration">
            <?php
           echo $generationMessage;
           ?>
       </span>
       

       
	</section>
	

		
  <script>
      

	  
	/*
	 Character() - Warrior Character Constructor
	*/
	function Character() {
        
        let strength = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	intelligence = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	personality = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let agility = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let stamina = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	luck = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        
        let strengthMod = abilityScoreModifier(strength);
        let intelligenceMod = abilityScoreModifier(intelligence);
        let personalityMod = abilityScoreModifier(personality);
        let agilityMod = abilityScoreModifier(agility);
        let staminaMod = abilityScoreModifier(stamina);
        let luckMod = abilityScoreModifier(luck);
        let level = '<?php echo $level ?>';
        let gender = '<?php echo $gender ?>';
        let armour = '<?php echo $armourName ?>';

		let fighterCharacter = {
			"strength": strength,
			"agility": agility,
			"stamina": stamina,
			"intelligence": intelligence,
			"personality": personality,
			"luck": luck,
            "strengthModifer": addModifierSign(strengthMod),
            "intelligenceModifer": addModifierSign(intelligenceMod),
            "personalityModifer": addModifierSign(personalityMod),
            "agilityModifer": addModifierSign(agilityMod),
            "staminaModifer": addModifierSign(staminaMod),
            "luckModifer": addModifierSign(luckMod),
            "acBase": 11 + agilityMod,
            "ascendingAC": <?php echo $totalAcDefense ?> + 10 + agilityMod,
            "descendingAC": 9 - <?php echo $totalAcDefense ?> - agilityMod,
            "hp": getHitPoints (level, staminaMod)

		};
	    if(fighterCharacter.hitPoints <= 0 ){
			fighterCharacter.hitPoints = 1;
		}
		return fighterCharacter;
	  
	  }
	  


  
       let imgData = "images/warrior.png";
      
        $("#character_sheet").attr("src", imgData);
      

	  let data = Character();
		 
      $("#strength").html(data.strength);
      
      $("#intelligence").html(data.intelligence);
      
      $("#personality").html(data.personality);
      
      $("#agility").html(data.agility);
      
      $("#stamina").html(data.stamina);
      
      $("#luck").html(data.luck);
      
      
		 
      $("#strengthMod").html(data.strengthModifer);
      
      $("#intelligenceMod").html(data.intelligenceModifer);
      
      $("#personalityMod").html(data.personalityModifer);
      
      $("#agilityMod").html(data.agilityModifer);
      
      $("#staminaMod").html(data.staminaModifer);
      
      $("#luckMod").html(data.luckModifer);
      
      
      
      $("#dieRollMethod").html(data.dieRollMethod);
            
      $("#hitPoints").html(data.hp);
      
      $("#ascendingAc").html(data.ascendingAC);
      $("#descendingAc").html(data.descendingAC);
      

	 
  </script>
		
	
    
</body>
</html>