ALTER TABLE `pesapi_payment` ADD CONSTRAINT `fk_mpesapi_payment_account` FOREIGN KEY 
(`account_id`) REFERENCES `pesapi_account` (`id`) ON DELETE NO ACTION ON UPDATE NO
 ACTION;
 
 pesapi_account  PRIMARY key is-> id
 pesapi_payment  PRIMARY key is-> id    FOREIGN KEY is->account_id
