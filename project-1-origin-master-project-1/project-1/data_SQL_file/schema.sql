
--

CREATE TABLE `category` (
                            `id` int(10) NOT NULL,
                            `category_name` varchar(100) NOT NULL,
                            `product_id` int(11) NOT NULL
);

CREATE TABLE `clients` (
                           `id` int(10) NOT NULL,
                           `client_Firstname` varchar(150) NOT NULL,
                           `client_Surname` varchar(150) NOT NULL,
                           `client_Address` varchar(200) NOT NULL,
                           `client_Phone` varchar(25) NOT NULL,
                           `client_Email` varchar(320) NOT NULL,
                           `client_Subscribe` varchar(20) NOT NULL,
                           `client_Other_information` varchar(320) NOT NULL
) ;



CREATE TABLE `photo_shoot` (
                               `id` int(10) NOT NULL,
                               `client_id` int(10) NOT NULL,
                               `photo_shoot_name` varchar(100) NOT NULL,
                               `photo_shoot_desc` varchar(300) NOT NULL,
                               `photo_shoot_quote` int(10) NOT NULL,
                               `photo_shoot_dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                               `photo_shoot_other_information` varchar(300) NOT NULL
);

CREATE TABLE `products` (
                            `id` int(10) NOT NULL,
                            `product_name` varchar(100) NOT NULL,
                            `product_upc` int(10) NOT NULL,
                            `product_price` int(100) NOT NULL,
                            `product_category` varchar(100) NOT NULL
).

--
-- Dumping data for table `products`
--
--

CREATE TABLE `product_image` (
                                 `id` int(10) NOT NULL,
                                 `product_id` int(10) NOT NULL,
                                 `product_image_filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `username` varchar(25) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(100) NOT NULL
);

--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`),
    ADD KEY `products_category` (`product_id`);

ALTER TABLE `clients`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `pass_reset`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `photo_shoot`
    ADD PRIMARY KEY (`id`),
    ADD KEY `photoshoot_clients` (`client_id`);


ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);


ALTER TABLE `product_image`
    ADD PRIMARY KEY (`id`),
    ADD KEY `productimage_products` (`product_id`);


ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `category`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225424;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25319;

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_shoot`
--
ALTER TABLE `photo_shoot`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245761;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8787;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147854;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;


ALTER TABLE `category`
    ADD CONSTRAINT `products_category` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `photo_shoot`
--
ALTER TABLE `photo_shoot`
    ADD CONSTRAINT `photoshoot_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
    ADD CONSTRAINT `productimage_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

