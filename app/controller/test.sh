#!/usr/bin/env bash
clear
ls | sed '' | grep .php | python error_check.py
