<?php
require_once('feedbackItemView.php');

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
    public function render($feedbacks, $editModeFeedbackIndex)
    {
        echo "<h1>Feedbacks</h1>";
        (new FeedbackItemView())->render($feedbacks, $editModeFeedbackIndex);
    }
}
