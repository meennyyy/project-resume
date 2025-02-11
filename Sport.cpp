#include<stdio.h>
#include<string.h>
#include<stdlib.h>

int main()
{
   int selectCar,
        ContinueRent;
    char* car_brand[] = {
        "Subaru BRZ","BMW 3 Series","BMW 2 Series",
        "Subaru WRX","Mazda MX-5",
        "Audi TT","Ford Mustang",
        "Mercedes-Benz CLA","BMW Z4",
        "Toyota Supra"
    };
    
    int Rent_one_day = 1700;
    int Rent_three_day = 5000;
    int Rent_of_week = 11000;
    
    int size = sizeof(car_brand)/sizeof(car_brand[0]);
    
    for(int i = 0; i < size; i++)  
    {  
        printf("%d.%s",(i+1),car_brand[i]);  
        printf("\n");
    }  
    
    do{
        printf("Enter Number car brand:");
        scanf("%d",&selectCar);
        if(sizeof(selectCar) != sizeof(int)){
            return 0;
        }else if(selectCar > 10 || selectCar < 1){
           return 0;
        }
        
        int index = selectCar - 1;
        //check selected car brand
        if(index == 0){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
            
        }else if(index == 1){ 
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
            
        }else if(index == 2){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 3){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 4){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 5){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 6){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 7){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 8){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }else if(index == 9){
            printf("-------------------------------------------\n");
            printf("The sports car of your choice is : %d - %s",selectCar,car_brand[index]);  
            printf("\n");
            
            printf("1. Rental promotion: 1 day %d",Rent_one_day);
            printf("\n");
            printf("2. Rental promotion: 3 day %d",Rent_three_day);
            printf("\n");
            printf("3. Rental promotion: 1 week %d",Rent_of_week);
            printf("\n");
            
            int promotion_select,
            continuePromotion,
            promotion_value;
            
            char *str_promotion = (char *)malloc(256);
            do{
                printf("Enter Promotion:");
                scanf("%d",&promotion_select);
                
                if(promotion_select < 4 && promotion_select > 0){
                    if(promotion_select == 1){
                        //str_promotion[] = "You have selected promotion 1 day";
                        strcpy(str_promotion, "Promotion 1 day");
                        printf("You have selected promotion 1 day");
                        promotion_value = Rent_one_day;
                    }else if(promotion_select == 2){
                        //str_promotion[] = "You have selected promotion 3 day";
                        strcpy(str_promotion, "Promotion 3 day");
                        printf("You have selected promotion 3 day");
                        promotion_value = Rent_three_day;
                    }else{
                        //str_promotion[] = "You have selected promotion 1 week";
                        strcpy(str_promotion, "Promotion 1 week");
                        printf("You have selected promotion 1 week");
                        promotion_value = Rent_of_week;
                    }
                    continuePromotion = 0;
                }else{
                    printf("Please Enter number 1-3 of promotion\n");
                    continuePromotion = 1;
                }
            }while(continuePromotion == 1);
            printf("\n");
            printf("-----------------------------------------------------------\n");
            printf("|                   Transaction Receipt                   |\n");
            printf("-----------------------------------------------------------\n");
            printf("|   Sport car select :   %s                     \n",car_brand[index]);
            printf("|   Promotion select :   %s                  \n",str_promotion);
            printf("-----------------------------------------------------------\n");
            
            int price,checkPrice;
            
            do{
                printf("Please pay %d the rental fee :",promotion_value);
                scanf("%d",&price);
                if(price != promotion_value){
                    checkPrice = 1;
                }else{
                    checkPrice = 0;
                }
            }while(checkPrice == 1);
            
            printf("successful transaction\n");
        
            printf("Do you want to do it again?");
            printf("\n");
            printf("Enter 0 for Exit or 1 for again : ");
            scanf("%d",&ContinueRent);
            printf("\n");
        }
        
    }while(ContinueRent == 1);
    
    

    return 0;
}
