compile:
	@php index.php > compiled.html 2>/dev/null 

lint:
	@php -l index.php 1>/dev/null

php_errors:
	$(eval RES:=$(shell php index.php 2>&1 1>/dev/null | wc -l ))
	@if [ ${RES} -ne 0 ] ; then php index.php 2>&1 1>/dev/null ; exit 1 ; fi

w3c:
	@curl -H "Content-Type: text/html; charset=utf-8" --data-binary @compiled.html https://validator.w3.org/nu/\?out\=gnu

clean:
	@rm -f compiled.html

all: lint php_errors compile w3c clean