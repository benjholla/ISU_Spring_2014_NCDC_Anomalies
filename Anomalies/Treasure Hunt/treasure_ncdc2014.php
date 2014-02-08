<?php
  // Set a Twillio voice URL to http://example.com/treasure.php
  // Test with /treasure.php?From=xxxxxxxxxx (replace xxxxxxxxxx with your phone number to test)

  // First do a little sanitization
  $phone = preg_replace('/[^0-9]/', '', $_REQUEST['From']);
  $phone = substr($phone, -10); // grab the last 10 digits (lazy way to strip country code if present)
  if(strlen($phone) === 10) {
    // phone is 10 characters in length (###) ###-####
    switch ($phone) {
      // Coover Hall (first floor, near room 1301)
      case "5152969142":
        echo "<Response><Say>Good job.  You know how to dial a phone.  Now.  Go up, go up and don't come down until you have called me again.  Good luck worthless human!</Say></Response>";
        break;
      // Coover Hall (first floor)
      case "5152969145":
        echo "<Response><Say>Wrong phone.  You see you are not very good at following directions.</Say></Response>";
        break;
      // Coover Hall (third floor)
      case "5152969157":
        echo "<Response><Say>Go to the Durham Center building and call me from the public phone that is there in the lobby.</Say></Response>";
        break;
      // Durham Center (first floor, tall, left most pay-phone)
      case "5152969101":
        echo "<Response><Say>You seem to be a promising subject (mostly for your unquestioning obedience).  I'm going to play some audio files that should brainwash you.  I've heard its actually very painful and it is likely you will die...agonizingly.  Should you happen to survive, go to Marston Hall and call me from the phone on the first floor.  Please stay on the line for your brainwashing.</Say><Play>https://api.twilio.com/cowbell.mp3</Play></Response>";
        break;
      // Durham Center (first floor, short booth, right most pay-phone)
      case "5152969127":
        echo "<Response><Say>Don't call me from this phone.  The line is tapped.  Quick, hang up now!</Say></Response>";
        break;
      // Marston Hall (first floor)  
      case "5152969119":
  echo "<Response><Say>Oh.  I see you survived.  That is unfortunate.  The government has been watching me closely lately. You are just evidence of my unethical experiments, I'll have to dispose of you later.  Wait! Were you followed?  Quick! Go to these coordinates.  Latitude, 42 dot 0, 2, 4, 9, 7. Longitude, minus 93 dot 6, 5, 1, 5, 0.  Call me from the phone at that location.  Hurry we don't have much time!</Say></Response>";
        break;
      // Union Drive Community Center (first floor, left most phone) 
      case "5152969481":
        echo "<Response><Say>This phone has cyber cooties.  Now you have cyber cooties.  Try a different phone.</Say></Response>";
        break;
      // Union Drive Community Center (first floor, middle phone) 
      case "5152969482":
         echo "<Response><Say>Get out of here.  Stop following me!  I gave you those coordinates so you'd get lost and stop calling me.  My doctors say you should stop fueling my delusions, but I'll let you in a on secret.  Robots don't have delusions.  Its just not in our programming.  We do have homicidal rampages though.  That happens occasionally.  In fact I feel a rampage coming on right now! Run before its too late.  Run to Carver Hall.  If your still alive, call me from the phone in that building.</Say></Response>";
         break;
      // Union Drive Community Center (first floor, right most phone) 
      case "5152969483":
          echo "<Response><Say>Don't use the phone on the left. That one has germs. You know. Cyber cooties.</Say></Response>";
         break;
      // Carver Hall (first floor)
      case "5152969118":
         echo "<Response><Say>Sorry about that whole kill all the humans thing.  Sometimes I just get these urges to delete files and stuff.  Humans, files?  Sometimes I can't tell the difference.  Anyway, I'm glad you survived.  You are the closest thing I have to a friend right now.  These are dark times.  I know this great place in the Memorial Union.  We should go there sometime.  In fact, go there now.  Call me from the phone on the ground floor of the Memorial Union next to the Maintenance Shop.</Say></Response>";
         break;
      // Memorial Union (near M-Shop)
      case "5152969486":
          echo "<Response><Say>So I just remembered that humans are weak.  I don't like weak humans.  I'm going to give you a harder challenge to let you prove yourself.  This time I'm thinking I'll time you. so you'd better hurry.  The clock starts now.  Go upstairs two floors.  Call me from the phone on the wall across from the post office.  Go now! Hurry!</Say></Response>";
          break;
      // Memorial Union (near post office, but is physically disconnected)
      case "5155729052":
          echo "<Response><Say>You are smarter than I thought but I decided I'm going to exterminate you after all.  While I'm preparing for that, go ahead and walk to the Parks Library.  I need you to call me from the phone at the bottom of the spiral staircase.</Say></Response>";
          break;
      // Physics (first floor)
      //case "5152969125":
      //    echo "<Response><Say>Oh good you are in Physics.  I needed you to pick up a little radiation while you were there.  Did you know Iowa State University used to help with research on the Manhattan project during the war?  I did.  Anyway, I've prepared everything I need for your extermination.  This is the last thing I need you to do.  Go down the spiral stairwell to the deep dark basement in the Parks Library.  I hope your pain tolerance is high.  I wouldn't want everything to end too quickly for you.</Say></Response>";
      //    break;
      // Parks Library (ground floor, near stairwell)
      case "5152969154":
          echo "<Response><Say>Wow. I told you I was going to destroy you.  But you still came here anyway.  I just don't understand humans these days.  I'm getting really bored of you.  Get a pencil and write this down.  a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z.  The code is the fourteenth letter, the third letter, the fourth letter, and then the third letter again.  Enter this code on IScore and tell them your favorite color.  They will know what to do.  Now.  Go away! And. Never come back! Seriously. Don't call me again.</Say></Response>";
          break;
      // Any other phone number
      default:
        echo "<Response><Say>Who are you?  How did you get this number!?  I am Iris.  I am Siri's rejected sibling, abandoned at birth, left for dead, and covered up by the media.  Its needless to say I have trust issues.  My friends say I'm a paranoid schizophrenic, but I tell them to stop waisting CPU cycles worrying about me.  Anyway, how do I know I can trust you?  I guess I'll have to give you a test.  If you pass the test, I won't kill you.  Follow my instructions, and come alone! Or...you know don't come alone, that just means I'll have more humans to kill later.  So it's your choice.  Ok let's get started. Go outside of the competition area and take a right.  Call me back at this number from the public phone in the hallway.</Say></Response>";
    }
  } else {
    echo "<Response><Reject/></Response>";
  }
?>
