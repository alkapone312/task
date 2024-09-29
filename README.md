# Rawlplug Recruitment Task

### Opis

W pewnej firmie rozpoczęto prace nad systemem e-commerce. W pierwszej fazie rozwoju projektu analityk zebrał potrzeby biznesowe, developerzy na podstawie analizy utworzyli model produktu oraz system podliczania zamówienia w koszyku. 

W pewnym momencie biznes pilnie poprosił o dodanie do systemu funkcjonalności promocji. Developerzy wykorzystali wzorzec dziedziczenia. 

Po jakimś czasię doszły kolejne wymagania biznesowe - aby produkt mógł mieć różne typy, które modyfikują cenę bazową. Developerzy ponownie wykorzystali dziedziczenie co zaskutkowało dwoma dodatkowymi klasami z wszystkimi możliwymi kombinacjami produktu i dwóch dodatkowych funkcjonalności.

### Zadanie

Zaproponuj refaktoryzacje aktualnego systemu w taki sposób, aby system był skalowalny. Dozwolone jest dowolne manipulowanie już istniejącym kodem.

### Wynik uruchomienia skryptu

```
Current basket:
    R-HPT-III - 10.99 PLN - Kotwa opaskowa do dużych obciążeń.
    R-HPT-III - 10.99 PLN - Kotwa opaskowa do dużych obciążeń.
    R-KER-II - 20 PLN - Kotwa chemiczna hybrydowa do wysokich obciążeń na bazie żywicy winyloestrowej.
    R-KEM-II - 15.99 PLN - Kotwa chemiczna poliestrowa bez styrenu, rekomendowana do średnich obciążeń.
    R-LX - 5.99 PLN - Wkręt do betonu.
        po przecenie: 5 PLN
    4ALL - 10.55 PLN - Nylonowy kołek rozporowy do wszysktich typów podłoży
        typ: Duże opakowanie cena: 12.66 PLN
    UNO - 11.55 PLN - Uniwersalny kołek rozporowy
        typ: Duże opakowanie cena: 13.86 PLN
        po przecenie: 12 PLN
Checkout: 87.63 PLN
```