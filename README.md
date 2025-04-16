APLIKACJA - FORUM SAMOCHODOWE - BY PIOTR OSZCZEPALSKI

Aplikacja stworzona w ramach projektu z przedmiotu "Bazy Danych" w czwartej klasie technikum. Jest to forum samochodowe, gdzie użytkownicy mogą udostępniać posty ze zdjęciami i opisami swoich pojazdów.
Administrator ma dostęp do swojego panelu, aby móc moderować forum. Projekt został napisany z użyciem języka PHP, bazy danych MySQL oraz technologii frontendowych: HTML i CSS.
Dzięki temu możliwe było stworzenie dynamicznej, w pełni funkcjonalnej i estetycznej aplikacji webowej.

START APLIKACJI

Aby rozpocząć testowanie aplikacji, należy uruchomić plik login_form.php oraz zaimportować bazę danych user_db.sql

ZDJĘCIA PRZYDATNE DO TESTOWANIA APLIKACJI

Zdjęcia, które można wykorzystać do testowania postów znajdują się w folderze o nazwie "test".
Po przesłaniu zdjęcia poprzez formularz, zapisuje się ono w folderze o nazwie "uploads".

LOGINY PRZYDATNE DO TESTOWANIA APLIKACJI

Rola user:
- piotr@o2.pl, hasło Piotr
- janusz@onet.pl, hasło Janusz
- maciek@poczta.fm, hasło Maciek

Rola admin:
- janek@admin.pl, hasło admin
- henryk@admin.pl, hasło admin
- gustaw@admin.pl, hasło admin

Można również zarejestrować się na forum poprzez formularz (odnośnik na stronie logowania,rola user) lub dodać użytkownika z poziomu panelu administratora (rola user lub admin).

FUNKCJE APLIKACJI

Podstawowe:
- logowanie (sesje)
- dodawanie użytkowników (rejestracja lub panel administratora)
- przypisywanie ról (panel administratora)
- dodawanie postów, które zawierają zdjęcia
- wyświetlanie postów
- edycja postów przez właściciela
- usuwanie postów przez właściciela

Dodatkowe:
- możliwość edycji wszystkich postów przez administratora
- możliwość usuwania wszystkich postów przez administratora
- możliwość dodawania użytkowników wraz z wybraną rolą przez administratora
- możliwość edycji użytkowników przez administratora
- możliwość usuwania użytkowników przez administratora
- sortowanie postów (tylko posty użytkowników lub tylko posty administratorów)
