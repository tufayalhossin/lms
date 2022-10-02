<?php

[
    "app" => [ // panel
        "course" => [ // module
            "title" => "lms",
            "name" => "admin",
            "actions" => [
                "category" => [ // feature
                    "title" => "category",
                    "name" => "category",
                    "routes" => [
                        [
                            "title" => "list",
                            "name" => "list"
                        ], [
                            "title" => "create",
                            "name" => "create",
                            "child" => ["store"]
                        ], [
                            "title" => "view",
                            "name" => "view"
                        ], [
                            "title" => "edit",
                            "name" => "edit",
                            "child" => ["update"]
                        ], [
                            "title" => "delete",
                            "name" => "delete"
                        ]
                    ]
                ],
                "subcategory" => [
                    "title" => "sub-category",
                    "name" => "subcategory",
                    "routes" => [
                        [
                            "title" => "list",
                            "name" => "list"
                        ], [
                            "title" => "create",
                            "name" => "create",
                            "child" => ["store"]
                        ], [
                            "title" => "view",
                            "name" => "view"
                        ], [
                            "title" => "edit",
                            "name" => "edit",
                            "child" => ["update"]
                        ], [
                            "title" => "delete",
                            "name" => "delete"
                        ]
                    ]
                ],
                "students" => [
                    "title" => "students",
                    "name" => "students",
                    "routes" => [
                        [
                            "title" => "list",
                            "name" => "list",
                            "child" => ["ajaxtable"]
                        ]
                    ]
                ],
                "instructor" => [
                    "title" => "instructors",
                    "name" => "instructor",
                    "routes" => [
                        [
                            "title" => "list",
                            "name" => "list",
                            "child" => ["ajaxtable"]
                        ]
                    ]
                ],
                "users" => [
                    "title" => "users",
                    "name" => "users",
                    "routes" => [
                        [
                            "title" => "list",
                            "name" => "list"
                        ], [
                            "title" => "create",
                            "name" => "create",
                            "child" => ["store"]
                        ], [
                            "title" => "view",
                            "name" => "view"
                        ], [
                            "title" => "edit",
                            "name" => "edit",
                            "child" => ["update"]
                        ], [
                            "title" => "delete",
                            "name" => "delete"
                        ]
                    ]
                ],
            ],
        ],
    ],
];
