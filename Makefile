.SILENT: run dev setup open_site
SHELL := /usr/bin/env bash
IP = 127.0.0.1
PORT = 8080
LINK = "$(IP):$(PORT)"
FULL_LINK = "http://$(LINK)"
TAB_OPENED_FLAG_FILE = "$(HOME)/.cache/php_tab_opened_flag"

setup:
	echo 'Setting up...'
	mkdir -p logs
	mkdir -p temp
	mkdir -p db
	echo 'Finished. You can start server now.'
dev:
	echo 'Starting development PHP server...'
	if ! [ -f $(TAB_OPENED_FLAG_FILE) ]; then \
		$(MAKE) open_site; \
		touch $(TAB_OPENED_FLAG_FILE); \
	fi
	php -S $(IP):$(PORT) -t src
run:
	echo 'Starting PHP server...'
	php -S $(IP):$(PORT) -t src
open_site:
	xdg-open "$(FULL_LINK)"