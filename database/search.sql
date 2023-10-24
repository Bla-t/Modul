SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `product` (`product_id`, `product_name`, `supplier`, `date`) VALUES
(1, 'Iphone X (2018)', 'Iphone', '2018-09-15'),
(2, 'Iphone 8 Plus (2018)', 'Iphone', '2018-08-15'),
(3, 'Iphone 8 (2018)', 'Iphone', '2018-07-15'),
(4, 'Iphone 7 Plus (2018)', 'Iphone', '2018-06-15'),
(5, 'Iphone 7 (2018)', 'Iphone', '2018-05-15'),
(6, 'Iphone 6 Plus (2018)', 'Iphone', '2018-04-15'),
(7, 'Iphone 6 (2018)', 'Iphone', '2018-03-15'),
(8, 'Iphone 5 Plus (2018)', 'Iphone', '2018-02-15'),
(9, 'Iphone 5 (2018)', 'Iphone', '2018-01-15'),
(10, 'Iphone 4 (2018)', 'Iphone', '2018-10-05');


ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;