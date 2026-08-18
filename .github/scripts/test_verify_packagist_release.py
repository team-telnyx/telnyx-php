#!/usr/bin/env python3
import unittest
from verify_packagist_release import GateError, validate_packagist_payload
SHA='a'*40
class PackagistReleaseTests(unittest.TestCase):
    def payload(self,version='7.98.0',reference=SHA):
        return {'packages':{'telnyx/telnyx-php':[{'version':version,'version_normalized':version+'.0','source':{'type':'git','url':'https://github.com/team-telnyx/telnyx-php.git','reference':reference},'dist':{'type':'zip','url':'https://api.github.com/repos/team-telnyx/telnyx-php/zipball/'+reference,'reference':reference}}]}}
    def test_exact_version_and_reference_pass(self):
        validate_packagist_payload(self.payload(),'telnyx/telnyx-php','7.98.0',SHA)
    def test_missing_version_fails_closed(self):
        with self.assertRaisesRegex(GateError,'version'): validate_packagist_payload(self.payload('7.97.0'),'telnyx/telnyx-php','7.98.0',SHA)
    def test_wrong_source_reference_fails_closed(self):
        with self.assertRaisesRegex(GateError,'reference'): validate_packagist_payload(self.payload(reference='b'*40),'telnyx/telnyx-php','7.98.0',SHA)
    def test_malformed_payload_fails_closed(self):
        with self.assertRaisesRegex(GateError,'payload'): validate_packagist_payload({},'telnyx/telnyx-php','7.98.0',SHA)
if __name__=='__main__': unittest.main()
