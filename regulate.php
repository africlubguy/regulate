<?php
/**
 * @package Regulate
 * @version 1.0
 */
/*
Plugin Name: Regulate
Plugin URI: https://africlub.net/regulate-plugin
Description: This is not just a plugin, it's a fork and adaptation of the Matt Mullenweg Hello Dolly plugin but using the lyrics to Warren G's song Regulate (featureing Nate Dogg). That makes it, maybe, not just a plugin, but the symbol of an entire new generation, summarized in Warren G's immortal question: damn what's next? When activated you will randomly see a lyric from <cite>Regulate</cite> in the upper right of your admin screen on every page.
Author: J. Salmon Kitololo
Version: 1.0
Author URI: https://bulcirfa.com/
Text Domain: regulate
*/

function regulate_get_lyric() {
	/** These are the lyrics to Regulate */
	$lyrics = "It was a clear black night, a clear white moon
Warren G. is on the streets, trying to consume
Some skirts for the eve, so I can get some fun
Just rollin' in my ride, chillin all alone
Just hit the eatside of the L.B.C.
On a mission trying to find Mr. Warren G.
Seen a car full of skirts ain't no need to tweak
All you skirts know what's up with 213
So I hooks a left on the 21 and Lewis
Some brothas shootin dice so I said 'let's do this'
I jumped out the ride, and said 'what's up?'
Some brothas pulled some gats so I said 'I'm stuck'
Since these girls peepin me I'ma glide and swerve
These hookers lookin so hard they straight hit the curb
On to bigger, better things than some horny tricks
I see my homey and some suckers all in his mix
I'm gettin jacked, I'm breakin my set
I can't believe they're taking Warren's wealth
They took my rings, they took my rolex
I looked at the brothas and said 'damn, what's next?'
They got my homey hemmed up and they all around
Can't none of them see him if they goin' straight pound-for-pound
They wanna come up real quick. Before they start to clown
I besta pull out my strap and lay them busters down
They got guns to my head. I think I'm going down
I can't believe it's happening in my home town
If I had wings I would fly, let me contemplate
I glance in the cut and I see my homey Nate
Sixteen in the clip and one in the hole
Nate Dogg is about to make some bodies turn cold
Now they droppin and yellin, it's a tad bit late
Nate Dogg and Warren G. had to regulate
I laid all them busters down
I let my gat explode
Now I'm switching my mind back into freak mode
If you want skirts step back and observe
I just left a gang of those over there on the curb
Now Nate got the freaks and that's a known fact
Before I got jacked I was on the same track
Back up back up 'cause it's on
N-A-T-E and me, the Warren to the G
Just like I thought, they were in the same spot
In need of some desperate help
The Nate Dogg and the G-child were in need of something else
One of them dames was sexy as hell
I said 'ooh I like your size'
She said 'My car's broke down and you seem real nice,
would ya let me ride?'
I got a car full of girls and it's going real swell
The next stop is the East Side Motel
I'm tweaking
Onto a whole new era
G-Funk
Step to this, I dare ya
Funk, on a whole new level
The rythmn is the base and the base is the treble
Chords, strings, we brings
Melody, G-Funk, 
Where rythmn is life, and life is rythmn
If you know like I know
You don't want to step to this
It's the G-Funk era
Funked out with a gangster twist
If you smoke like I smoke
Then you high like everyday
And if your ass is a buster
213 will regulate";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function regulate() {
	$chosen = regulate_get_lyric();
	echo "<p id='g-funk'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'regulate' );

// We need some CSS to position the paragraph
function g_funk_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#g-funk {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'g_funk_css' );


