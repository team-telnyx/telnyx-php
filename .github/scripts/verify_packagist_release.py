#!/usr/bin/env python3
"""Verify exact PHP release availability through Packagist."""
from __future__ import annotations
import argparse,json,time,urllib.request,urllib.error
from typing import Mapping,Any
class GateError(RuntimeError): pass

def validate_packagist_payload(payload:Mapping[str,Any],package:str,version:str,release_sha:str)->None:
    packages=payload.get('packages')
    if not isinstance(packages,dict) or not isinstance(packages.get(package),list): raise GateError('malformed Packagist payload')
    wanted={version,'v'+version}
    matches=[x for x in packages[package] if isinstance(x,dict) and x.get('version') in wanted]
    if len(matches)!=1: raise GateError('Packagist version is missing or ambiguous: '+version)
    item=matches[0]; source=item.get('source'); dist=item.get('dist')
    if not isinstance(source,dict) or source.get('type')!='git' or source.get('reference')!=release_sha: raise GateError('Packagist source reference does not match exact release SHA')
    if not isinstance(dist,dict) or dist.get('type')!='zip' or dist.get('reference')!=release_sha or not isinstance(dist.get('url'),str): raise GateError('Packagist dist reference does not match exact release SHA')

def fetch(url:str)->Mapping[str,Any]:
    req=urllib.request.Request(url,headers={'Accept':'application/json','User-Agent':'telnyx-release-verifier'})
    with urllib.request.urlopen(req,timeout=30) as r:
        data=json.load(r)
    if not isinstance(data,dict): raise GateError('malformed Packagist payload')
    return data

def main()->int:
    p=argparse.ArgumentParser(); p.add_argument('--package',default='telnyx/telnyx-php'); p.add_argument('--version',required=True); p.add_argument('--release-sha',required=True); p.add_argument('--attempts',type=int,default=12); p.add_argument('--delay',type=int,default=10); a=p.parse_args()
    if len(a.release_sha)!=40 or any(c not in '0123456789abcdef' for c in a.release_sha): raise SystemExit('invalid release SHA')
    url='https://repo.packagist.org/p2/%s.json'%a.package
    last='not attempted'
    for attempt in range(1,a.attempts+1):
        try:
            validate_packagist_payload(fetch(url),a.package,a.version,a.release_sha)
            print('verified Packagist %s %s at %s'%(a.package,a.version,a.release_sha)); return 0
        except (GateError,urllib.error.URLError,TimeoutError,OSError) as exc:
            last=str(exc); print('Packagist verification attempt %d/%d: %s'%(attempt,a.attempts,last))
            if attempt<a.attempts: time.sleep(a.delay)
    raise SystemExit('Packagist release verification failed closed: '+last)
if __name__=='__main__': raise SystemExit(main())
