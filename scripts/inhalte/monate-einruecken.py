#!/usr/bin/env python3
"""Kurse unter jeder Monatsüberschrift in <div class="text-indent"> fassen (wie die 2026-Spalte).

Liest bodytext von stdin, schreibt das Ergebnis nach stdout. Monatsüberschriften
(<p><strong><u>…</u></strong></p>) bleiben linksbündig. Mehrfach ausführbar: vorhandene
text-indent-Blöcke werden vorher aufgelöst.
"""
import re
import sys

html = sys.stdin.read()
html = re.sub(r'<div class="text-indent">(.*?)</div>', r'\1', html, flags=re.S)
absaetze = [p.strip() for p in re.findall(r'<p[ >].*?</p>', html, flags=re.S)]
ueberschrift = re.compile(r'^<p><strong><u>.*?</u></strong></p>$', re.S)

bloecke, kurse = [], []
def kurse_abschliessen():
    if kurse:
        bloecke.append('<div class="text-indent">' + '\n'.join(kurse) + '</div>')
        kurse.clear()

for p in absaetze:
    if ueberschrift.match(p):
        kurse_abschliessen()
        if bloecke:
            bloecke.append('')
        bloecke.append(p)
    else:
        kurse.append(p)
kurse_abschliessen()

ergebnis = '\n'.join(bloecke)
# Sicherheitsprüfung: kein Absatz darf verloren gehen
assert len(re.findall(r'<p[ >]', ergebnis)) == len(re.findall(r'<p[ >]', html)), 'Absatzanzahl weicht ab'
sys.stdout.write(ergebnis)
