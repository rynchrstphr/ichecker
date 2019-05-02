-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 03:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ichecker`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusertbl`
--

CREATE TABLE `adminusertbl` (
  `id` int(30) NOT NULL,
  `employeeid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusertbl`
--

INSERT INTO `adminusertbl` (`id`, `employeeid`, `username`, `password`, `fname`, `lname`, `level`, `status`) VALUES
(1, '001', 'admin', '$2y$10$IOlxXdTmLOwHmOUQJYUA3OLAHWuRQngIkLyK2ZfBwpCArOMuv1fYq', 'admin', 'admin', '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `collegetbl`
--

CREATE TABLE `collegetbl` (
  `id` int(30) NOT NULL,
  `collegename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegetbl`
--

INSERT INTO `collegetbl` (`id`, `collegename`) VALUES
(1, 'College of Science (COS)'),
(2, 'College of Industrial Technology (CIT)'),
(3, 'College of Industrial Education (CIE)'),
(4, 'College of Architecture And Fine Arts (CAFA)'),
(5, 'College of Liberal Arts (CLA)'),
(6, 'College of Engineering (COE)'),
(10, 'Expanded Tertiary Education Equivalency Program (ETEEAP)');

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `id` int(255) NOT NULL,
  `collegeid` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`id`, `collegeid`, `coursename`) VALUES
(1, '1', 'BSIS - Bachelor Of Science In Information System'),
(2, '1', 'BSCS - Bachelor Of Science In Computer Science'),
(3, '1', 'BSIT - Bachelor Of Science In Information Technology'),
(4, '1', 'BSES - Bachelor Of Science In Environmental Science'),
(10, '1', 'BSLT - Bachelor Of Science In Laboratory Technology'),
(11, '6', 'BSCE - Bachelor of Science In Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `documenttbl`
--

CREATE TABLE `documenttbl` (
  `id` int(30) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `collegeid` varchar(255) NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `documentid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documenttbl`
--

INSERT INTO `documenttbl` (`id`, `qrcode`, `studentid`, `collegeid`, `courseid`, `fname`, `lname`, `mname`, `documentid`, `image`, `date`) VALUES
(33, '$2y$10$QnQufTuUoeLOkltNqM4Sz.kgsYRrrgcyq/BExQHETwAxnM3.TOs2S', '15-038-006', '1', '1', 'Ryan Christopher', 'Avanzado', 'Gunting', '1', '53535805_259901531563700_1238663298241527808_n.jpg', '2019-03-17'),
(34, '$2y$10$3nTvFAs5fplgaFYSSVngZ.pCgNBSqTcyZeAGlxB6XEjUVcVZl8NT.', '15-038-006', '1', '1', 'Ryan Christopher', 'Avanzado', 'Gunting', '1', '53535805_259901531563700_1238663298241527808_n1.jpg', '2019-03-18'),
(35, '$2y$10$KlvRVtzJ2JQFVzMCwPAKGe/2vr0ev5/YhlfyUBIeu8waj7mfEIvIK', '15-038-006', '1', '1', 'Ryan Christopher', 'Avanzado', 'Gunting', '2', 'img004.jpg', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `documenttypetbl`
--

CREATE TABLE `documenttypetbl` (
  `id` int(30) NOT NULL,
  `documenttype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documenttypetbl`
--

INSERT INTO `documenttypetbl` (`id`, `documenttype`) VALUES
(1, 'Diploma'),
(2, 'Transcript Of Records (TOR)'),
(3, 'Registration Form'),
(4, 'FORM-138');

-- --------------------------------------------------------

--
-- Table structure for table `mainusertbl`
--

CREATE TABLE `mainusertbl` (
  `id` int(30) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '-',
  `orgpass` varchar(255) NOT NULL DEFAULT '-',
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contactnum` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL DEFAULT '-',
  `status` varchar(55) NOT NULL DEFAULT 'inactive',
  `lastloggedin` varchar(255) NOT NULL DEFAULT '00-00-0000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainusertbl`
--

INSERT INTO `mainusertbl` (`id`, `companyname`, `email`, `password`, `orgpass`, `fname`, `lname`, `position`, `contactnum`, `address`, `userlevel`, `status`, `lastloggedin`) VALUES
(5, 'Microsoft', 'ryanICTII@gmail.com', '$2y$10$kkKQtMlbrenUbQSEIYKpD.sNRoSS9bzivX/MPQQrz5E9YjtRKN5.i', 'micro123', 'Ryan Christopher', 'Avanzado', 'HR', '0987654321', 'Taguig City', '3', 'active', '00-00-0000'),
(6, 'iConcept Contact Solution', 'ryanchristopher.avanzado@tup.edu.ph', '-', '-', 'Ryan Christopher', 'Avanzado', 'HR', '0987654321', 'Ortigas, Pasig City', '-', 'inactive', '00-00-0000');

-- --------------------------------------------------------

--
-- Table structure for table `qrcodestbl`
--

CREATE TABLE `qrcodestbl` (
  `id` int(255) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `used` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qrcodestbl`
--

INSERT INTO `qrcodestbl` (`id`, `code`, `used`) VALUES
(3065, '$2y$10$KlvRVtzJ2JQFVzMCwPAKGe/2vr0ev5/YhlfyUBIeu8waj7mfEIvIK', '1'),
(3066, '$2y$10$P2r4RFcTe0APnGJCK/Jqv.19UXPo3KMh0VaHF.IkP823CHcBRfsI6', '0'),
(3067, '$2y$10$MGYKZwgXjRbrdMLxvhDps.jogTKlgnLlg0/dN6Qw5Vq5oJX382IYG', '0'),
(3068, '$2y$10$PStDK8qDbs5xAlLndP/kqulx4JCI725kF2zib.I87O7MvmbZncYMG', '0'),
(3069, '$2y$10$OfW2fv4p9P/9nMCR5tf5kenWBqYRcTrVRfGsrKqRFuNygZ7jXSqP.', '0'),
(3070, '$2y$10$eLlMQJF/yTn3YUjh7sCTVuAOeqjyGlWi3/u6caCUik38BOIbShOna', '0'),
(3071, '$2y$10$YW0MqJ.Mfzg9v5gbnvINDe3KeqIloIXO8kyHGttuAIokEW/Be4lwi', '0'),
(3072, '$2y$10$8rmj16S2fhPoWkgqdMoisuw63MDoeJvuTaOG2SDofAB/jKh7y02Te', '0'),
(3073, '$2y$10$87ueQ9bUuWf9YVr1yNEYYeDwq443Jv9EO2XgY14YYFdXzwG.dG8cu', '0'),
(3074, '$2y$10$AcgCPVAa04YImMhmRjAICuAM/Mp7eIYur6YD.c7DR1P11x4CsI/GS', '0'),
(3075, '$2y$10$/jPcyn8N4gu5Ke.FyC4XoemE5U4swNAFjo5/t8WB7GE1zbMnHzORS', '0'),
(3076, '$2y$10$GdUaaBCxiY1AImtg3b0Fy.IaEhgTb5eyQJNOv7Vf0eKG2Zd4ClTc6', '0'),
(3077, '$2y$10$TgAo8fajtYoDHnXqXJiJN.hOlA2w73jX3q1kPfUxlJ8CnMnUXLAxq', '0'),
(3078, '$2y$10$/H9scP26rVn49ET7V.T9U.flC3w.G5U5cbZOsJwtAW8XAHx.Ic61K', '0'),
(3079, '$2y$10$YKVcPWG1jKOeEh/ZFPegdOt.Jm/OiL.HjL7eSzxE76w1IEFLGPUiK', '0'),
(3080, '$2y$10$B32qA/BDjaOrUZq8MF2KhO2eOCfslbTYekiBRXfv6nGL3sX5T.3V.', '0'),
(3081, '$2y$10$UT7k6IUdEFzAST5NOJ6Pae2ow089y0MvAt1ZnueKRGl/2SBqMsnBO', '0'),
(3082, '$2y$10$7xmm6azTX/5XQ2VweL8Yv.4MK55fbPpskDEJo4bCW6qQqjRbKyQd2', '0'),
(3083, '$2y$10$XZb5738etW9JXCM2BomucOBnpxGC7uXrPdICjv3nTGyFJvjwHYubK', '0'),
(3084, '$2y$10$jgMKZFC6YBBhKs8qCR5fb.7r7fz0/WYAU9cCRdgFyMZMKYPM/bt3.', '0'),
(3085, '$2y$10$OFVbq2.salrok.ntTAnOquN5dsL5pNGJT8mUtrp.NXdpTG3JQIzsa', '0'),
(3086, '$2y$10$uv6Y6Fhs0gHbyTyXotH.OOBlRsKIBzh/.LdBRRmXY6zkFvTuHbryy', '0'),
(3087, '$2y$10$JWy5A9/eCi6Z7xDFxjleYO5GVaZ4c21xHyucZCnFmB7IeXtqUWVjW', '0'),
(3088, '$2y$10$X3i8s6pm2/zfDGLvxdyYOOf3PGGr7XM/r.5mYAsBwLzMKr1HUuHkm', '0'),
(3089, '$2y$10$HUT41Wc4fp4Fsa5787l2MuW856AL.Dp9.6RgbBu0YVGkb58rYXOeu', '0'),
(3090, '$2y$10$AVdCjjJd6wCH9iSDyG7iM.u38txd5SdlthYJKdtSjmAvRD5IteaTu', '0'),
(3091, '$2y$10$2VEK17DhaQSjTIGRwuVVN.7DVqyT2GgmG8AuM2GdjpzqLlhfQUoDi', '0'),
(3092, '$2y$10$Nb7L5hwKpdMajVrJ2Pik8ePbOkyk7f.ClBBJFfR3kZOvxV6zWnfCK', '0'),
(3093, '$2y$10$sGj1jDYU6AYYbP6XDoC/sekaG80z90WhtQHNmtLP/YeY.3GMMsS.e', '0'),
(3094, '$2y$10$0RuB3Wjxu/1JxBQxXXwd/esFHEYfNzSvZDmG2N8F8EhsPSSpFkRgm', '0'),
(3095, '$2y$10$Da1O8SPdXIn8yS7AI2VCCu2RTAoACmoAscmr1tQudD4Zn.OIUewUe', '0'),
(3096, '$2y$10$6448o86HH0A5JslOoUHYL.a7N.Si3FN00QzUW7VQaVXHjjCQUh.t.', '0'),
(3097, '$2y$10$/Zr7ALoc2fSD9jQVYEkG9u3ElcZeRhBzdzQMdQ1nRfXa3YhsgfGQW', '0'),
(3098, '$2y$10$sgRa5W2QCpONmW/jxa6rT.3sj0fHcOCuRLCxBoKlpZOLserFths6G', '0'),
(3099, '$2y$10$1t8tGrXFb8sZ3Tc46FOUZuC.uSFfXt4W3wQL8AYn86yUnLefd8aN.', '0'),
(3100, '$2y$10$BAOc7Xa8MPMhK.6O2YwN5OnXFdR4GQvjTx5zslQ75SwOc4hMbtqru', '0'),
(3101, '$2y$10$BGvwItDgibXjwYm0fb5IaOZW5AY0PiKBcJHoNvDC70RYggxdQ3vDq', '0'),
(3102, '$2y$10$wJn7e/OyZqSWiyCFU7Fgzu9GTcLsfHI15Ho66cte5p2T8MeF6UgUW', '0'),
(3103, '$2y$10$/MPTqndgYmpRUkDRYxc7geIEOstBLB7yiXOJ8yWfAGoS95PU./5lq', '0'),
(3104, '$2y$10$z3quvcF1jv1zjwQHDMraleISE.6BkuRlQP/gmJK8nJbLFJ.ZIiJKK', '0'),
(3105, '$2y$10$3IZhY/crb9eDbSYcHO835ukoRXTYyc4GqV5lNpht86w0N58mM27eG', '0'),
(3106, '$2y$10$L8h9plGOrBGHDstGZA1T5epiNaIBcmj6.YjY7NiG8ZbrUVaL85fKC', '0'),
(3107, '$2y$10$SCxjOqP0HEWVZ0qwzEBSXecLNcSZf5BY13buh0N1MK9CC5.ZTRjTy', '0'),
(3108, '$2y$10$MI4RVpe3IV5Bx3dgSg5/9uBmHDkxg.EyqRuPXxjaXwjGOvYZq9bua', '0'),
(3109, '$2y$10$HE7.LxTlclG3NWu4gn./bukannaC6zz4lT2rzy8fVR9LtQf6JO3Ym', '0'),
(3110, '$2y$10$Q3RFC2Sy4VQBv4M3QAZkpu9Mdf7xX1dFh225eSTZwJ3JLgSyjOQSi', '0'),
(3111, '$2y$10$yuTQm3IENO1t3EcGsHzyJu3q6rH5eiyO4vZFWs.UIXOPE.ND2DJ/S', '0'),
(3112, '$2y$10$rfakXEldFUChqiZRxzCyfOxwaj7HYuQEyF7lbnlezlmPxiieoYq06', '0'),
(3113, '$2y$10$ZOC1Tmi9Ht6HHv26p0i9Auc3vmRCAHi083txCwowQ/N9OKG/tcQf6', '0'),
(3114, '$2y$10$QnQufTuUoeLOkltNqM4Sz.kgsYRrrgcyq/BExQHETwAxnM3.TOs2S', '0'),
(3115, '$2y$10$3nTvFAs5fplgaFYSSVngZ.pCgNBSqTcyZeAGlxB6XEjUVcVZl8NT.', '1'),
(3116, '$2y$10$5D7iL4FmKbhGqKLxRMD/rOnZFxFiuqVUwXmoekL1JgLAuriEL9V6C', '0'),
(3117, '$2y$10$9dkgqcide66qJxzD0eUos.zngdWLKovMM1EubdLhFzHSIq84ZTXe2', '0'),
(3118, '$2y$10$ZcsqKoW3XfDg1ndBqza2/u2/GlOcMKuJyQhiaE20dc9P2vLlWPdzm', '0'),
(3119, '$2y$10$OqXdCKQLq6V.mJDGv6S4XOmncsbQQ/cjfamjoWZQcUxiSd8w0I/t6', '0'),
(3120, '$2y$10$V44YnVXPCUMdefek1BDMi.hiRL.GzXyOUBCkaP3kjXeemjSSpvBOW', '0'),
(3121, '$2y$10$VyFXRKm5smt8wPEdLWKetuXKri7xPWxecD8ImqrYVNyZ9znOX6EQ2', '0'),
(3122, '$2y$10$brFPSzn9ZStAJzvUaDjozevRWy89j85DeEK.i8kZ3VX/Cijn3ymI.', '0'),
(3123, '$2y$10$q.3ReNFkKUdr1b2jiCKYbez9GkYlIAufJz56Xo3EYU.gQxTDiHvoe', '0'),
(3124, '$2y$10$cprna0jjqehiSarfPERp1uXGNLh.3U6X6VNIT85a1I9CjHt6BFrIG', '0'),
(3125, '$2y$10$dVEU/08GwzZBRuRuOvnkb.UUe68Wa/w9xsvpvTWF0Fnjg1wy7bYvu', '0'),
(3126, '$2y$10$.x/SK9OS5gPQd0aZs3WncORU1McAoPTSvB7wR6eqU/L/O/SSqa.uS', '0'),
(3127, '$2y$10$KqdHwTe93gcYoPDCvtEgtujIaLzVaiEI2ptoOyVKyB1W.TuxYzYhm', '0'),
(3128, '$2y$10$rgsesUpDtUjHLeYjwkyPROK2sUAWdOcUYhciGS7VKpYyHyK5ZQoRW', '0'),
(3129, '$2y$10$76COuWPryJ/55Ctm32xY4OGX.5jWco6doqiPL9hZcQNtJHmejX8eG', '0'),
(3130, '$2y$10$AyfFRKqlRLX2bK2WwTCrr..2A8TTYmkELJdZ/SnUtZ6F9OS5RhgH.', '0'),
(3131, '$2y$10$II/HtIDj8/Cd1vVpPszB3OtG7a47T4d5Iatlax0U/b9J.Eh.NHdre', '0'),
(3132, '$2y$10$kdQRq6hLX1GAQu7zg9SeceFhz59UnHshDkkCpC2ycZTHZXC7LDu.G', '0'),
(3133, '$2y$10$AdWiGywrIv6W474Hm6uuwuStjHSe8Ovws5mDWz/hZBjHNujwnoO8W', '0'),
(3134, '$2y$10$tItwYLhfmH1Nu.dnE6lU7OhL4SZxDXupNkO9oWSuCALF5EoBcrU2.', '0'),
(3135, '$2y$10$RZF5GwjWhntzRaY0zAwt/OAvwpmSvpW4XpOC.w.1/fQ5pWQGNo5Um', '0'),
(3136, '$2y$10$awUXJJ6wK7OjS14o1cL9ROZWnlujmsGMDDIAUTIkXV/msjoIsEkKW', '0'),
(3137, '$2y$10$InSAjE3bisI7ecaHJWzJ.OP2OB7dpPq61.6GwznDRLC1zlUpz.0i6', '0'),
(3138, '$2y$10$d0viZpO5euop05ti3jADteuvoFuU8VUwjSUwnyaGhRssjz7.Sve.i', '0'),
(3139, '$2y$10$arq4W7HJqKbkdFBS6IoFLuz6vBEbBsTzG.KeP4Gvju7HddvN5iwiO', '0'),
(3140, '$2y$10$5Qk4BuX.rsuR6zsQYJnevu8DNkfy.PcThf5BMDk9ODVrz2.V/wjIS', '0'),
(3141, '$2y$10$y9px12SqLcTa..etqOIRmuJoCmHNH7b6s1qwmRt/X/stW.py1rXGm', '0'),
(3142, '$2y$10$iM/tKCRWvycx4oUkOKmrJukOdmh0CgYwMAsEKRx.laSF95oNHtRJK', '0'),
(3143, '$2y$10$STWo/RXgKU9f22.ueWjO2.M0OeLpIY45g9P68txQpgEjbIFpjzLSC', '0'),
(3144, '$2y$10$eBluplll7/uOn8Lg4IkqKuUPeVTufB//.qdFKQh3EgGicqsisZK.O', '0'),
(3145, '$2y$10$N/rCaHnoKTiaAv2o2xvPdO9FLVvNw5UQ1KnmGhzXN99EAjc7S.OEu', '0'),
(3146, '$2y$10$yVZBWp.2g0WI5PPaict7eud0BU/zbZo8SreLxKxQYrIZuDU3VPDta', '0'),
(3147, '$2y$10$R9rZUxEbB3B6qWdpdJvAbeTSqpJkAWuemsx67c0gqOY4OK5VGHu9e', '0'),
(3148, '$2y$10$XZALN4BW1c39O8RckJdRwO75wwfQJ7Y/YoX0wm82nz2LF9Jlk33rO', '0'),
(3149, '$2y$10$58OOURgqXQhsxfpdtuHnduOhZzo1H/29sYkXRdCvk6TMJys8M0kRG', '0'),
(3150, '$2y$10$fECzvmZMnRXVLEXWQeZfcOxIdDdi/X7QsiExUxnSLJ8mhdIfCukyK', '0'),
(3151, '$2y$10$lroV86TpIjNA7Vww9jvSnubVIJ2CPg.eWj4HELTYDLyND7IZgKZjy', '0'),
(3152, '$2y$10$o1fMZGoepztXmgu5K7nUrOQMCWOyvuP/Y/EKKP2PEuxmtD34IS8ze', '0'),
(3153, '$2y$10$4CrnZQPmObGLjrfo1IfZEuv.WuXjBOKCv2istXxY0uLFl.XKgRvLa', '0'),
(3154, '$2y$10$nWHFR9TIcYu4FTw9B0Skd.mXWasW5qpkMF3r0lHgm32U6quW7ZtV.', '0'),
(3155, '$2y$10$b.wBcK66UDmdW6HQA4f6pue.vyDknPCKl7l6Sq8oAW2F4gGDhR5Py', '0'),
(3156, '$2y$10$4sEBA4Blm6mYOpEKbaCvmuPWUn84hu4od.IE8kErpWcHZzbzhUewq', '0'),
(3157, '$2y$10$/0z.mPWGz25ZNufo0pcDLOxgOcQ/GaZ6HktEWBu3yiBjJqWUrZOfW', '0'),
(3158, '$2y$10$c.24Lv5Cu9GMUH8dygFKQ.lN7nii9mmzs5jTfr1dNLv/ASlSCnL4C', '0'),
(3159, '$2y$10$Dks5LDf7qZYv5oKfzRjxj.e4xo2lV/fxQqLEm.WWQZsmAr8upY4WC', '0'),
(3160, '$2y$10$giloY1Ps8WXZmhhgruCrWeuVbftpXgPOxLhI/Gi8/2fj5wchWRxWC', '0'),
(3161, '$2y$10$fkMnYJ0HahwYFdvBPcXkbOwsT5zy5LtEhmP9gWxRI6g259ZIOB9ne', '0'),
(3162, '$2y$10$1NhYJ42.avENVX9SeTMm8.W2YLfVntqq2BsEIhV3NBRTJcIaYMVg.', '0'),
(3163, '$2y$10$ap5eVUHfegbYBLU/f5kvtuxvq91qBos/EyJRfKoK/UWPe9uVqLEI2', '0'),
(3164, '$2y$10$AtdabFZ..L28.VOfVUqAKeQ67nYIuVtgI3trT3GRTrdeLXwmOgnTW', '0'),
(3165, '$2y$10$uySI4qIUCHpEEhobxNm.r.VM2LqDKHAp/XPr471ALnWUaZmcGPgvO', '0'),
(3166, '$2y$10$FdwFVk6jcYrHp4qxMvY0WOlF8Lt5fTDK.8nvh7p3tp4bAYEyzJqPe', '0'),
(3167, '$2y$10$Dig0aRA919UFufYvxq/Z3.amY0/z.wZBvei3oR9Qknd/JL3L76phG', '0'),
(3168, '$2y$10$U1WQ.vavteScC//zC.1AreXUSFRjpIWLvEpRw4HwFafZRYoTjXqAS', '0'),
(3169, '$2y$10$cEsucE8JWs3HzovgLUtN2e7O9KX64x4Tq10V.9WJQuinPzOBQihpG', '0'),
(3170, '$2y$10$aw3xXK7BlMCbyNRrrxFUG.GT0BLdgigYAOvEt8.HdgAsJa7l87G8.', '0'),
(3171, '$2y$10$3/wTGyEHBJOlpPEWd/4RwOgKuVKG00TVlqn0X/lLYfuug2Jgzsaf.', '0'),
(3172, '$2y$10$2TSh2D1Ky/gQaQedBnY0gOHmn51AYcz0ZkqysGXVr5RtWGTZAASzm', '0'),
(3173, '$2y$10$IKUpHeAI5jpsFxfk/K/KDuSg/Gy8SD64cB7jxcjeD8QaT8CYVwm96', '0'),
(3174, '$2y$10$oaSofAnvIuWfvu0TsjY.MOhU1QOycYRoN80SCBncX4srfUyGW9.Bq', '0'),
(3175, '$2y$10$bETvyoj0uk6QIyNg4SCuSuhupoRi2WvOzwQ62.7aisDbeS8M0gRie', '0'),
(3176, '$2y$10$2XMM97UEjGXsP6GYEMt58.GZMzcydpyEICeXQp2.BZ18IXkaLt5/2', '0'),
(3177, '$2y$10$xy9N5VJdm5hF38zk9q0iKe3QuLHLopH/.ryDvABZqUTRPAlXuxIma', '0'),
(3178, '$2y$10$nIWQ3ivaBeqvXvHk7EnkJu3xo8KWvQSWnc.jvmC0hhaG0gS4v8bRW', '0'),
(3179, '$2y$10$Wq7To57ixORwHcJQ5DSjzuBLLHY4a59NL6/PGbPnB0WrO2YWL5u2m', '0'),
(3180, '$2y$10$0nWm5fB3V3A0tD3u3CBcreUPhROAaAgPtbKPX3WITXGEnAceFyAQW', '0'),
(3181, '$2y$10$PC4FSt/hvR6OgKXOw7PyAeTatAtUUdXL.bm3gmltmfsNmq1CMKQ9K', '0'),
(3182, '$2y$10$43a0vP6ChNjM/lOOJc9n3ue4Xfs.Z/drSvWHPlqo8bEVsywbLMdcy', '0'),
(3183, '$2y$10$lZv.t4DPrTMy6H.PMhWXFOc1UgJ9NKDg6qSSe.f5i8gjd.KMjqxAC', '0'),
(3184, '$2y$10$psp.dY6ZRTu5Fje7ga/uE.5ngRPNHMLWHaSqdy0ZGtjsiwt8QKhvG', '0'),
(3185, '$2y$10$dvCOVLMIaQdAQwUdyQtQE.NZLSJH1Z336ziyqpy/aZEQntnJjVOyu', '0'),
(3186, '$2y$10$Ivatp.q/Va/oVt7Yre0ciu8/fePa4akfFzCT0vvGAmWb2pyAc2SS6', '0'),
(3187, '$2y$10$0o/tEnsRudl1sfavcQ8L5ecsfonZ/FKRTpGxiSpCDsAXLvs91n0V6', '0'),
(3188, '$2y$10$b3DNZ3TzeGr/dAE8MwRgfOdLqHTDwrC5AH15xwEBou3grdMcfFUEK', '0'),
(3189, '$2y$10$PngfDE8c/Vjt6NZQpm74GeX/izKtHPvpSGU9hkjOsK9PBKfazF2I6', '0'),
(3190, '$2y$10$hVdnZXghsx1ZTZRCIq.g6.jcsXPrqsEGWRe7QUXThMkfcOuDUJW42', '0'),
(3191, '$2y$10$jDPqbtwV89/hQ0La9G5BSewd57iu0oFysNL2KYCPJIMA40DALCqVW', '0'),
(3192, '$2y$10$1F25KurLeJJKJYarpkXBVugy3NXLOVlNs1HtVXoyqOhWKz.RN6EBm', '0'),
(3193, '$2y$10$mKkcM6/qRJlwI6dB0tAYoO/zf6t6P7jrZPEsu1DFfu8D6Gq3wAcDq', '0'),
(3194, '$2y$10$9pyZexnnNa9UhiwwAjsCnO.oPRKuaT0kkD46Si0IunEIuv68N1aTi', '0'),
(3195, '$2y$10$H6tjbMS4i.qlaRB/0eLsv.WYVTUzakFjngfRI0yGQXAL3h5r5AcwW', '0'),
(3196, '$2y$10$tOM0Nkb4Evgbb3sn65z0Yu9DBxEbqHXE5ZorZNDwj/z3RiwBPR6B2', '0'),
(3197, '$2y$10$8mhrNtzRUSI7i6rYdunTr.nK0Gxy7XkUHJlCpxa2jAJyrctiichQ.', '0'),
(3198, '$2y$10$B0IBEmMlQ2AAeNc0PFccIuv1n1vTX5N5lB3nL5JPr9XgLV2Oke5I6', '0'),
(3199, '$2y$10$gy7CssR.Zb6vVQHz5EBtU.pZAd3eeFPKozhI0U8YsfmTxGu1Lq4GO', '0'),
(3200, '$2y$10$KdpViZJIG.bhi15yrd.7ZOcu/CcdxFFn5sRqn9OVRQwT2rqySDyZ2', '0'),
(3201, '$2y$10$2KB88Yvyuxidcl716MbJM.k/AzptZKxX3nDkjDvRpaxBJbBvI2C8q', '0'),
(3202, '$2y$10$MGAr4MP.Gaxhm4L2H5qYse735p58GobLea021idX5gjZ9Fg8GucNy', '0'),
(3203, '$2y$10$APHjdJQuz2PvHUqYpFYnBOBnIswXiugK40Mma5YM5ekOOfEQnqOb2', '0'),
(3204, '$2y$10$af9w942JdetZi1DlJYmnsO1IjlAyjhtQe/d1zlIxcHLYLUBhiCOq6', '0'),
(3205, '$2y$10$UznCj9L5baXl2h./WNurHuOX.4UY1wys23hate56KsIFygb5Ga5Iu', '0'),
(3206, '$2y$10$RrX8x5YceGW2bHXo1pFFleVRkkm4G21tJiKuT4IyKMZRLxcCREYmK', '0'),
(3207, '$2y$10$VBeB0IpVVW1/xMBaB1u52eGSKv3yReZZiVICpckXYZruf2PBgjeuy', '0'),
(3208, '$2y$10$n7v3MYDh.7MsyoFe4XXSpuiEehGuRC9MNeVE7ij5WgY6mC3HZD6tW', '0'),
(3209, '$2y$10$kpM6t0JvHHQ6w.XFCf2oG.6aP7MlpIw3WfwRxRU8HNQ/u3BDnYe.m', '0'),
(3210, '$2y$10$kXkJONFRRpv/O6WR6oPYg.Ae3xqGUA.idE7mkzWlgPZUhrHx9eS4O', '0'),
(3211, '$2y$10$5xnz/r0SneWNwHIKgwnL4.DpfIvavtzC7yNTg6XbeQFNk8YP0CFA2', '0'),
(3212, '$2y$10$XLM1l7YT2oWEOPEDgj2i2ev22BcE6l7/bwywUpV04kUu8qpSttUaG', '0'),
(3213, '$2y$10$eWlmXY9XJDadUMfVMzx2te9/BUdqoUpiahsr5tytEcLnc/AUXZeQW', '0'),
(3214, '$2y$10$PoJdx4ZDt1kn22t5FP0Nk.E0b8PT9wyMZJ1a208X8ysXRPUGCjhCi', '0'),
(3215, '$2y$10$IEa9orRtZlhX3tttDLSj1.RdY4CcQ8RNG6MlEQLPxNGJ81GahWdcW', '0'),
(3216, '$2y$10$tA9HzYOr9BS2ZozSjAiTN.a8jSqh4YWUfpc5g6aSG6ZuCGY4dzDFm', '0'),
(3217, '$2y$10$gU0rfntNPl5Camy3y14fVuWfV1yUbzUdeNStXnuJ9dIGynhEdkW2S', '0'),
(3218, '$2y$10$i7oJQTjGgzZK1Xi4pa2u4eH0vKxh7UM6KkDEQa6pJ3Ec5.CnS7e8K', '0'),
(3219, '$2y$10$MHn.Ex6a7WRGUk17BYDFRO2XByix5UaXtEjarNTS/HxZt07d.stSG', '0'),
(3220, '$2y$10$pTx9BgVPoFX8v4WQu1rj7eBE.sAVJRTPOUG3sj36.x6sx5Hf6ND4q', '0'),
(3221, '$2y$10$Ghq1S5IOyhp636KBp0t1WuBbIoYRV8fFHlN6NCyn4f3AC2Bu/PK2i', '0'),
(3222, '$2y$10$c4s3orRyjNfKMwfj5ZvHSeh2kJ.OgDXGhszDJQHqEpgckXJceE42W', '0'),
(3223, '$2y$10$GKfy47FI9AfwKrn7JcipYOYDmPjctYEbQEx69lydR45m6BAJa88RG', '0'),
(3224, '$2y$10$5v8nYP.HKjOd2xr3hOGatuU0ZFA60oDqz57BvLOYMQBlWdsU4z5U6', '0'),
(3225, '$2y$10$3E.FEdkVay6DBZo2ODVL0OuqLWBkDWmiB0nhald0zkot8R20MPp1K', '0'),
(3226, '$2y$10$1t6KluXGqsmyYJ9Ytido1.bjH6smOCJMpRopKTG5nGVYKxlD4uneq', '0'),
(3227, '$2y$10$nPpmk0QC7mDCwj7iW.3WAuDxC6R.Nu5aml3orP1Te.i94Bxj1QaNC', '0'),
(3228, '$2y$10$1eIyfBwCSY6k1.qwLg4AauJqDlxXmatuX6w3GtqctxAC9aZJdRscW', '0'),
(3229, '$2y$10$uOKaMVVtwveNZPuwBAJc2O9Vif7DY2YG70lel0BXvSVT4EhD34lia', '0'),
(3230, '$2y$10$eHr6ZQXeUUbRKs0sS6z6m.XK.3Rhv9hJIOxf2sjCkFEH2RlFtF7WG', '0'),
(3231, '$2y$10$R8akbRzammjqzru/WPdJuOxifrTZZ/SGoza6Kk93gvEISi89JKPZO', '0'),
(3232, '$2y$10$zlGy94BhhWcB0wB2Uwb7/eaPmc9LBC3YacoWUEmcTON1gsF227Zg6', '0'),
(3233, '$2y$10$TX5A92oiFTc9O0iWZzCdZeJXVumSDdRVN8U.c1rIMVzgmJmL0fQCC', '0'),
(3234, '$2y$10$0DHyhT7twzXHkD08Sk1l4uWX/DgMVAdSAvvfkVO1L.oUpAhJONMfi', '0'),
(3235, '$2y$10$QAqe8G4POF7IxBEs6.T4QOSEQpUcMqD0DPZ3ayatsOqLWIxTV20B6', '0'),
(3236, '$2y$10$9Wm0SdzK4lW7IXrP9PMqmebtI6vegvv/0f4ZFy0/PZjdalgiAHbBC', '0'),
(3237, '$2y$10$9x9gvngZE6KkF4zpyd7sSOPK/6CyeEUE0/TypLQnqzZVHaeU/3PZq', '0'),
(3238, '$2y$10$rrEdoHyYn3qrOosQ50NVtu./kFRNmru8kAJ1sz50e5dDyRBwVyuBi', '0'),
(3239, '$2y$10$UGvvBgQZRHaW91CDrza4femxjbbSFIpFNwAckTOyZ0rcv5vlM3M.G', '0'),
(3240, '$2y$10$bWIA.dBxaM6t8IIucPdyxOLHvBBbwivxmsyBzTrTdegmBtvTf4/c6', '0'),
(3241, '$2y$10$LYxC0DFik9W9ZzQ8EXhikertNPVR3gH6OYNEN.rbQJzkSizEUllZ6', '0'),
(3242, '$2y$10$20F5EyxeZC8wkFcQazkMnez0bQ7wF9U5z.mD6/6RvAwN0TthBz3LC', '0'),
(3243, '$2y$10$FlJL1I8FTAX7vLUDXe6rOunEYu3rJ2aa2XQSfac9D/9sY5wS8/hCC', '0'),
(3244, '$2y$10$8bkNwyD3HEbbmrep3XqIDOtv1KFmlI0MDvxYRtW5yOvoxk0idM1Re', '0'),
(3245, '$2y$10$zRsA8.FrNt76sSIFspzxBO1kGSbJ6bLSDsJG07C/.II.cVQPdK2u.', '0'),
(3246, '$2y$10$Fed3F2hRb5sLvGF5QbMRtOAm0FL03mC6oLbdtEcRzTcGHUi8kF8yu', '0'),
(3247, '$2y$10$CC1xKeHzlRUJPmhkCgd1B.1MtxGutyJDXK8agyhNZSLhyKDXsW3Oi', '0'),
(3248, '$2y$10$pLNUQuRsmY3kin4l.W7EHOkuJ5vWdWxQOIfG7OejVrwLYcCKONAXC', '0'),
(3249, '$2y$10$nzWB8ywimo.cZVue9IKaH.EGkaW/Cu5TWKL0H.SFXS8iT.AI7Zg0a', '0'),
(3250, '$2y$10$XuQOX0ZC8BrSiL56qP7DxeKEIOeiZhAH.8vkK0pfZzebBas2bjhDC', '0'),
(3251, '$2y$10$9FVgijK18o2gQP/VPYah5uL/idvAZPxitrX.P6/YHmcNLrTRero3O', '0'),
(3252, '$2y$10$EVns2zhtM55Fs1k8jE2gk.Zob4TfzbvGLR1oBYdzFwJtking1TDTG', '0'),
(3253, '$2y$10$OHnBqSOG0Wd8P9Z/XK7/2Oee37rNam6Et/oKVmM3g8ZyDUKIu7HkS', '0'),
(3254, '$2y$10$T7alm1pfKKHndx0oLnsg2.5uef6ZHBtVXmFIUO5x7X0vxFO.Jtqnm', '0'),
(3255, '$2y$10$WtSr0oQMZH2X263QB6SvxeUU.PfG0kZ8s.fKxuE99I9eEGDnTsiCa', '0'),
(3256, '$2y$10$1diokKdr5BL2eE64wY5es.ftP70sZ9bjrFoPru06ZJLCLAjH5cklO', '0'),
(3257, '$2y$10$9YzuRobkpV4ebfhtjxYnMuIB3Kid04Yua.hpTCqk9S5GbE0uc8wE.', '0'),
(3258, '$2y$10$LKcau8/auCBddcqOoCkSa.LAYE2RrPW292f/OeYjfRjs698pky4Si', '0'),
(3259, '$2y$10$5Ws9U5RS3LmhlaXPbTZu9OUtvn5.pY7Vj8u/0SkdsQ/qUQ2a7R1aK', '0'),
(3260, '$2y$10$eLUQg7UZH7P6c9FKtCPo8uJjlVW3m6sYr8kWXHUv51GxCP9FvNqz.', '0'),
(3261, '$2y$10$nyyvBp/cVzMZUYRllVislOeBXpddHNXc0khmVSJ5SesareVqPUNA.', '0'),
(3262, '$2y$10$vL9eDsvYfLMzGYNISQglfuDksirtyA.Xi83sfYVCDurFJ4.Tp8CXG', '0'),
(3263, '$2y$10$fKy712ZWX3Ag1jThjDeT8.dsxCFAsYgcEZ/UMiNmJkQ6aOWDFr/va', '0'),
(3264, '$2y$10$SKclwvp.O1HF1mZyn3NpReT5hSF4kvgwfZ9sfw2TiiS/VbFLETlCe', '0'),
(3265, '$2y$10$pWGq49P7dvTNcVXZgYdD7uRC28uP0f6gZGvMYIi9OyFAN6SqjZcny', '0'),
(3266, '$2y$10$P/Sauk6oIzaDbI2DyqnvVe1sVNk/JP/6EwAg6zJrM2dyXs.QfrU32', '0'),
(3267, '$2y$10$1d9btWiwLsBDvgwxNZX1cenqwM9mruWoQ7OHBKCGpyBhyLr2nw.x6', '0'),
(3268, '$2y$10$daA9NgF98jgz94.LjVVQqe1F7DGQLDE5JeU/.XiX4HpL/wgyCjMw2', '0'),
(3269, '$2y$10$bbTO3JBHgto1nhlBvU/PlusYp1jwH.Y4PGCLKouXa9U9I2IsFu4.y', '0'),
(3270, '$2y$10$eI0IapNmXwVBbUFEPdyj4O8tWNFf5kkNIiNu/FukD10X2HYP1E5fK', '0'),
(3271, '$2y$10$qgpU.D2OTlqfucGDKTyzq.Afhanq4U/pS4YHDUIUvwrkeYCfDL58K', '0'),
(3272, '$2y$10$w/4P61PUYO8KbEzBvxjnOuPugkJSvpxkQ4NlaDbrXz3sQUYD.qbaK', '0'),
(3273, '$2y$10$jCGfz43zZq2GlBaf8Z7yJef28BdTE.kUKlsGetMYe4WwM6qzXpGzy', '0'),
(3274, '$2y$10$ixAmqg5HzgaWtxwtLnCgy.yeeYadWSYmROhZKikwblL2cUzC4fApy', '0'),
(3275, '$2y$10$Crx4lKgsf5Fgg0H9A3xBHeYdob0ERxxVqVal1BlT.VRcCGgFzVItS', '0'),
(3276, '$2y$10$pncx3b9Msj4Tk0OJrZ1WVuWQgz0hB/WuoAHHMKZQ7MOTUi7U7gPZS', '0'),
(3277, '$2y$10$iss7DhGFPSYlyukisuH.1enHFl5zJyKPHZs7upO1jH1tVQF8/vZp6', '0'),
(3278, '$2y$10$W8RB1VEFG8g7Rh46bHEqSeOGM5oWoGoT2uXVNp338yV.RRkhwsxZC', '0'),
(3279, '$2y$10$s8iBxYcY816AsSTbh0yJie/4zcjl1Ac96OTwd6dPB1TK/Y.SYwf7y', '0'),
(3280, '$2y$10$ANgWbmu44hKRBC4dk.Puo.GevIQamV59k15sjr1fX9okhMlpE.FoK', '0'),
(3281, '$2y$10$lTZM0IZwrg5Ts2ht0/ss0OF9vyDRrVWnAhhE3.LT2FL9JH5c8qV4y', '0'),
(3282, '$2y$10$5SVnO8UEU4pjFlIfa3eu2eQZXV8rgg7M33/njPFXg437Tg/8gmghm', '0'),
(3283, '$2y$10$O/oK3OEwvHj22Jy9St8AJuuHpYSrR2GvKTKfsxVkqTMeJmnE5CYDC', '0'),
(3284, '$2y$10$M3dh96jkugBUgJeskMwmku80GOYtDjjkeAwOWXFv5g55m.Nw2ddwq', '0'),
(3285, '$2y$10$NtHwfwBpaGGEsTw81LJYwep3hZiIE9yUt.LMdN73MRmDaEoUb6zcW', '0'),
(3286, '$2y$10$q9umPDxJODQ3nS/.hawvwuctMWBF3O2aCkFjLZIQyvZUV5.EG.Cum', '0'),
(3287, '$2y$10$MIfgQmbQ3vv0WqEqVYL43Os1VLsUeFam73qTFYNN81NLfR51jVnb6', '0'),
(3288, '$2y$10$fZB31z33OiXO0fVlH15F9ObDX0kj1u8iWDJkmEgl9o7ZpXsMbnX42', '0'),
(3289, '$2y$10$Fe5gAnL2uyLr9RqV5Q79b.6c83O3bjfVU9X77ExIa5HJdJRJTCPyi', '0'),
(3290, '$2y$10$f7diDgnKafE37c6ROlXKkONNNzlxsmZQuIYhMqaVgWRntcSosEEcu', '0'),
(3291, '$2y$10$wgGSY/uDnGD6AK6ShPDqR.i2wmoU6DshAj3BFlZaQwtKbd1Bj.UEO', '0'),
(3292, '$2y$10$lsA.xqbpscZuJG3MeJ5dbuFZrSPfcTwXjOG.3ercrP.IYIm2Nt0gy', '0'),
(3293, '$2y$10$hyYFMF8TB80C3giCcwEr7ulNKnx7gJW4if4V6tRsxAGbzytXNKRvy', '0'),
(3294, '$2y$10$39oE4ZKw2xYolZlDP/u19uPBghWpZOJ9hJ4R84c1OrkI06Xw/ArdC', '0'),
(3295, '$2y$10$gqWexMGMv/1.ZxDSJD4c8OKEEYQmHb3OQjX7Idgq7fNK2USkNofIW', '0'),
(3296, '$2y$10$tjqo1PtiR1Dh0SectsnWZe1AYCqwqkPwEgFNa7BuY9rV4fKdMb3nG', '0'),
(3297, '$2y$10$ErZj4azOf32fSolG6/6bQ.9v0dx9r0Hstu9RO6UsvAYHnd9IuCDAu', '0'),
(3298, '$2y$10$UJ0GitNTpLtZ4VfQsHTE5u64ARuiWq7WHRdS/Q4BGoT0YhDq1Rbhe', '0'),
(3299, '$2y$10$UJciKzk4o4.K80peFvECIOuS74HahbgpNi/NGR9r3LnHSH2M3KGa6', '0'),
(3300, '$2y$10$Y8eg8EQ07O2jfzzT6Q/6T.jBOZVnq7YBbZXnvS492wUTMS1Zmqrt6', '0'),
(3301, '$2y$10$aHyBE.o5Mv3.56Hn/F4MReoVVQlofwAKtfyW9lpjic1dep4zo/BTa', '0'),
(3302, '$2y$10$Zavkcyy7bGjpc3lEcof30ePmEF3AE5qgO04Snf1xil8iB00NpziCm', '0'),
(3303, '$2y$10$otGgVNtGWZFH75TCK6ScZufOYt3Z/jJOYRqFO/qCVxoCz07yjDVVC', '0'),
(3304, '$2y$10$Ex6KWDFDX6tBFY48/Io1w.2jKKZ5Zm3/Cyi7nkyIVNUSPszCn2caK', '0'),
(3305, '$2y$10$7lBTAXicLwnOSkledLhF4.tN/wmA/zAMavNCDG89sw9LqijGi3vhq', '0'),
(3306, '$2y$10$PLK0xez.MBoSgB/s/L/7n.UOCIk/e/xaTmsU/kDrrWach06/v8QR.', '0'),
(3307, '$2y$10$LwjGEJgmd1NcqPkSt9dN4eLnl6/FCSpdHdKE7tWd0PbUHKNwpvPxG', '0'),
(3308, '$2y$10$cmf0Aq/Hjnnx2iOoDwn1YeC7aVxBmZrmIZzrTreu9sLzvNi3eZqRe', '0'),
(3309, '$2y$10$qeK9Je9Vh6.cSQBz0peXyuIoRt7pfFbi9hZUCqbAHhn4w70pPf8uu', '0'),
(3310, '$2y$10$cz8VaS6qMWkGI3HDrZjO.Oza.E8I5rGgYA/MiRJc.5HVCcPgnjSiq', '0'),
(3311, '$2y$10$Qeyuui8W38XvXVJ1z87ZleFeWaWdD2EVDwz/LUh8/zOq9/bbpU9QC', '0'),
(3312, '$2y$10$1gyjE4dJ/C0ijqQU8erGseLYI7QVTwnExL1/0FRXLb2z6IWoBaina', '0'),
(3313, '$2y$10$GspfOFxN9DEtUbDa18YLxupQcrvrXHx8.KDTTb7kXVyXrCgM4yp/W', '0'),
(3314, '$2y$10$366THNrVAFipN7oiiFg97uCjy4kmj2KzuLQzaZudWz3UeJiWNrNMK', '0'),
(3315, '$2y$10$096IlQopnibYZaoFDo59yOz4Q9g7a0iRw7YK8YyBMU9AdAekTzaS2', '0'),
(3316, '$2y$10$G2XhBJXW8TBXAq6q7MNtQOL418tQxS.CivPMbCqpLsdXxNHWnZWdW', '0'),
(3317, '$2y$10$YMzxZgUuUldKVIJkKjo/E.W.PsH/rlGk5kqx3sRdfFkZJ8JYHjhAm', '0'),
(3318, '$2y$10$SSUA7F9WKnsfGEw9rbJziuqaaQFg3TBdtaSJ/NePUP75g/6rpHzSu', '0'),
(3319, '$2y$10$QpVAFP4au/SpSi.3d.fIpenWKZPeGe2wfCO4s54pwUyuqoY0cHgIy', '0'),
(3320, '$2y$10$R1OK4lkaageStzkwTREz2OL/5dph3Bsr/txwHCsO2lML3asx0cDQC', '0'),
(3321, '$2y$10$pqFUuoWCVETXPWbIfDD65.tSAN1t8lpG/4o/7uWZLFp006MImOzNe', '0'),
(3322, '$2y$10$XJkdPnygrgbM/zhJDHawyO24fx03PUx5HglTX5RXAFFukepK8RoCC', '0'),
(3323, '$2y$10$owXzs5nRF7nbx64sR1euY.tBuSMYXMCvPHr8o5acVLERzxr/uAV3q', '0'),
(3324, '$2y$10$qpbu/cr4LHTHDToH3CuU0.5tYwCh3FHtTnuedFrgs.40xtNic4fte', '0'),
(3325, '$2y$10$goZD3vmHMUUfPwNdorrpf.QKMH95Wms9mHAdiKwfI9DN9icTa93k.', '0'),
(3326, '$2y$10$UgslrI4ON/773rnCDxSBz.T1IJGLK.CTnI/5YiYxYZtXonGhBcZHG', '0'),
(3327, '$2y$10$jidLMW9hKh0Wr7WCxaRld.B7h1hi4ADXemt6UVkG5PPZM8s/2WsDS', '0'),
(3328, '$2y$10$urJe2DEc26QIT18eDh1Pcua6I0taCJ1.GMBR4NuRj1eW/j5TiN5bq', '0'),
(3329, '$2y$10$XK2s//IQ3qYHEbs0FvzVzuQ.6sBdA6VrE9KzEz0kjc3jVZYl.xloS', '0'),
(3330, '$2y$10$c6mGxg/6Ovudp/sIcYh2GOvS4wgwHrxcSBlLJwRzJtRNm8mr3SwK.', '0'),
(3331, '$2y$10$tOhExjzljza9X3xt7jADreW44fS2qKkeJ0MgX/mdDFT3qm5x2CTo.', '0'),
(3332, '$2y$10$t/qrgDBMcXHi6NAA0BQTIeMpasNFWpWLsaNX0BXrIpktzYeHMUHfK', '0'),
(3333, '$2y$10$rpQYw/FKgPVrNs9xbzd9BeARi4mouCAap6T2u8vReDhGAgkoW8Rjy', '0'),
(3334, '$2y$10$P0Rlgrq47wY0qIXEFyUY8OjPN1lVSjKU2Mu0IbpjviBWHsDXeKg4u', '0'),
(3335, '$2y$10$zst1.WhsWiOly0P3bWjB.OEA4BCw7ah8YCWVHL0FodbJ/CYvvjcoS', '0'),
(3336, '$2y$10$B0B59aBdTbBAfx/4cvo6uOohqAHdDVQdo3gtYz/ojtmREznXla05q', '0'),
(3337, '$2y$10$.45CMZuuC7dWFEHDUvKqdekGZp45JeqSdd6gLtD/BRsptwJ2C.jZW', '0'),
(3338, '$2y$10$eRmOB3Sii3KejrKdF6mO9.CVyu76tbq3WwZTnoAfit3tNJ0iqf4dC', '0'),
(3339, '$2y$10$3Lp8AFOFMcxeuRWwquhWyOz1TPfCgtrVVkVQFN.t2nD82crNd7Dcu', '0'),
(3340, '$2y$10$gkbjCefQJyZd551cfDWIzeEMjLPnub/L9MJ2o09qbHg6oWt8AWwNS', '0'),
(3341, '$2y$10$g3VUcJhhK8t.T6yxR6zlbuE28S4wRFFlZEdfMYZ/VSJ9JeAfqCAbG', '0'),
(3342, '$2y$10$CfyumKY5qnG96N8Ymh8Xtu4PksCDwlT.sQafGQRUxFhMht.zYmOBa', '0'),
(3343, '$2y$10$4Y/C1SoIYkUneT1iSddseO.pU.w4YwEWT5VG9tLELuEaHiKtvDGSW', '0'),
(3344, '$2y$10$YOYweUK.lUfLcQA0Rqdzj.AQRWwotXRRW4L3ntpGxVvnmeT1vBt4m', '0');

-- --------------------------------------------------------

--
-- Table structure for table `scanneddocu`
--

CREATE TABLE `scanneddocu` (
  `id` int(30) NOT NULL,
  `docuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `documenttype` varchar(255) NOT NULL,
  `companyid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scanneddocu`
--

INSERT INTO `scanneddocu` (`id`, `docuid`, `name`, `documenttype`, `companyid`, `date`) VALUES
(1, '34', 'Ryan Christopher Avanzado', '1', '2', '2019-03-18'),
(2, '33', 'Ryan Christopher Avanzado', '1', '2', '2019-03-26'),
(3, '35', 'Ryan Christopher Avanzado', '2', '5', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `userleveltbl`
--

CREATE TABLE `userleveltbl` (
  `id` int(30) NOT NULL,
  `userlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userleveltbl`
--

INSERT INTO `userleveltbl` (`id`, `userlevel`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Main');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusertbl`
--
ALTER TABLE `adminusertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collegetbl`
--
ALTER TABLE `collegetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documenttbl`
--
ALTER TABLE `documenttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documenttypetbl`
--
ALTER TABLE `documenttypetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainusertbl`
--
ALTER TABLE `mainusertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcodestbl`
--
ALTER TABLE `qrcodestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanneddocu`
--
ALTER TABLE `scanneddocu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userleveltbl`
--
ALTER TABLE `userleveltbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusertbl`
--
ALTER TABLE `adminusertbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collegetbl`
--
ALTER TABLE `collegetbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `documenttbl`
--
ALTER TABLE `documenttbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `documenttypetbl`
--
ALTER TABLE `documenttypetbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mainusertbl`
--
ALTER TABLE `mainusertbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qrcodestbl`
--
ALTER TABLE `qrcodestbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3345;

--
-- AUTO_INCREMENT for table `scanneddocu`
--
ALTER TABLE `scanneddocu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userleveltbl`
--
ALTER TABLE `userleveltbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
