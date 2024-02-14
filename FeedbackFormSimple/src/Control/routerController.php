<?php


class RouterController
{
    public function handleRequest($baseUrl)
    {
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

        $fields = [
            [
                'wrapperClassName' => 'mb-3',
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Enter your name',
                'value' => ''
            ],
            [
                'wrapperClassName' => 'mb-3',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Enter your email',
                'value' => '',
            ],
            [
                'wrapperClassName' => 'mb-3',
                'label' => 'Feedback',
                'name' => 'feedback',
                'type' => '',
                'placeholder' => 'Enter your feedback',
                'value' => '',
            ]
        ];

        $request = $_SERVER['REQUEST_URI'];
        $requestURL = explode($baseUrl, $request);
        $requestedPath = '';
        $prefix = '/';

        if (count($requestURL) > 1) $requestedPath = $requestURL[1];

        switch ($requestedPath) {
            case '':
            case '/':
            case $prefix . RoutingPaths::HOME:
                if ($requestedPath !== '/') {
                    header('Location: ' . $baseUrl . '/');
                    exit();
                }
                (new FeedbackForm())->render($fields);
                break;

            case $prefix . RoutingPaths::FEEDBACK:
                (new FeedbackPage())->render($feedbacks);
                break;


            default:
                http_response_code(404);
                echo 'Error 404';
        }
    }
}
