<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report1  = [
            'name' =>'Spam',
            'question'=>'Report as spam?',
            'affirmation'=>'We remove:',
            'actions'=>'Clickbait #Advertising #Scam #Script bot'
        ];
        $report2  = [
            'name' =>'Pornography',
            'question'=>'Report as pornography?',
            'affirmation'=>'We remove:',
            'actions'=>'Photos or videos of sexual intercourse #Posts showing sexual intercourse, genitals or close-ups of fully-nude buttocks'
        ];
        $report3  = [
            'name' =>'Hatred and bullying',
            'question'=>'Report as hatred and bullying?',
            'affirmation'=>'We remove:',
            'actions'=>'Posts that contain credible threat #Posts that targets people to degrade or shame them #Personal information shared to blackmail or harass #Posts or threats to post nude photo of you'

        ];
        $report4  = [
            'name' =>'Self-Harm',
            'question'=>'Report as self injury?',
            'affirmation'=>'',
            'actions'=>'We remove posts encouraging or promoting self injury, which includes suicide, cutting and eating disorders. We may also remove posts identifying victims of self injury if the post attacks or makes fun of them.'
        ];
        $report5  = [
            'name' =>'Violent,gory and harmful content',
            'question'=>'Report as violent, gory and harmful content?',
            'affirmation'=>'We remove:',
            'actions'=>'Photos or videos of extreme graphic violence #Posts that encourage violence or attacks anyone based on their religious, ethnic or sexual background #Specific threats of physical harm, theft, vandalism or financial harm.'
        ];
        $report6  = [
            'name' =>'Child Porn',
            'question'=>'Report as child porn?',
            'affirmation'=>'We remove and may report to legal entity about:',
            'actions'=>'Photos or videos of sexual intercourse with children #Posts of nude or partially nude children'
        ];
        $report7  = [
            'name' =>'Illegal activities e.g Drug Uses',
            'question'=>'Report as illegal activities?',
            'affirmation'=>'We remove and may report to legal entity about:',
            'actions'=>'Posts promoting illegal activities, e.g. the use of hard drugs #Posts intended to sell or distribute drugs'
        ];
        $report8  = [
            'name' =>'Deceptive content',
            'question'=>'Report as deceptive content?',
            'affirmation'=>'We remove:',
            'actions'=>'Purposefully fake or deceitful news #Hoax disproved by a reputable source'
        ];
        $report9  = [
            'name' =>'I just don\'n like it',
            'question'=>'What can I do if I see something I don\'t like on 9GAG?',
            'affirmation'=>'',
            'actions'=>'Report it if it doesn\'t follow 9GAG rules.#Downvote it to decide which posts/comments can go viral.'
        ];
        \App\Report::create($report1);
        \App\Report::create($report2);
        \App\Report::create($report3);
        \App\Report::create($report4);
        \App\Report::create($report5);
        \App\Report::create($report6);
        \App\Report::create($report7);
        \App\Report::create($report8);
        \App\Report::create($report9);

    }
}
