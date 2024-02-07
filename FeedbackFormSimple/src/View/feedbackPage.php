<?php
require_once('feedbackItem.php');

$feedbacks = [
    [
        'name' => 'Jhon Doe',
        'email' => 'asd@asd.test',
        'body' => 'hello world',
        'date' => '12.12.12'
    ],
    [
        'name' => 'Mike Doe',
        'email' => 'asd@asd.test',
        'body' => 'hello world',
        'date' => '12.12.12'
    ],
    [
        'name' => 'Jane Doe',
        'email' => 'asd@asd.test',
        'body' => 'hello world',
        'date' => '12.12.12'
    ]
];

class FeedbackPage
{
    public function render($feedbacks)
    {
        echo "<h1>Feddbacks</h1>";
        foreach ($feedbacks as $feedback) {
            (new FeedbackItem())->render($feedback);
        }
    }
}
// tmp solution
// Fix it in routing implementation
(new FeedbackPage())->render($feedbacks);
