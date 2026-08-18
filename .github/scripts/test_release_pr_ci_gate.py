#!/usr/bin/env python3
"""Static contracts for DOT-2061 PHP phase 2."""
import unittest
from pathlib import Path
ROOT = Path(__file__).resolve().parents[2]

class PHPReleasePRGateTests(unittest.TestCase):
    def test_classifier_owns_every_full_ci_job(self):
        ci=(ROOT/'.github/workflows/ci.yml').read_text()
        self.assertIn('name: classify production CI',ci)
        self.assertIn('classify_production_ci.py --event-path',ci)
        self.assertNotIn('>> "$GITHUB_OUTPUT"',ci)
        self.assertEqual(ci.count('needs: classify-production-ci'),2)
        self.assertEqual(ci.count("if: needs.classify-production-ci.outputs.run_full == 'true'"),2)
        for test in ('test_release_pr_auto_merge.py','test_release_pr_ci_gate.py','test_classify_production_ci.py','test_validate_next_provenance.py','test_verify_packagist_release.py'):
            self.assertIn(test,ci)

    def test_next_readiness_is_lightweight_and_fail_closed(self):
        w=(ROOT/'.github/workflows/next-readiness.yml').read_text()
        self.assertIn('branches: [next]',w)
        self.assertIn('name: next-readiness',w)
        self.assertIn('validate_next_provenance.py',w)
        self.assertIn('--expected-next',w)
        self.assertIn('MERGE_TOKEN: ${{ secrets.SDK_WRITE_TOKEN }}',w)
        self.assertIn('persist-credentials: false',w)
        self.assertNotIn('./scripts/lint',w)
        self.assertNotIn('./scripts/test',w)

    def test_release_workflow_verifies_exact_packagist_version(self):
        w=(ROOT/'.github/workflows/release-please.yml').read_text()
        self.assertIn('name: Verify Packagist release availability',w)
        self.assertIn('verify_packagist_release.py',w)
        self.assertIn('--version "$VERSION"',w)
        self.assertIn('--release-sha "$RELEASE_SHA"',w)
        self.assertNotIn('release-pr-auto-merge.yml',w)

    def test_readiness_remains_trusted_dry_run(self):
        w=(ROOT/'.github/workflows/release-pr-readiness.yml').read_text()
        self.assertIn('pull_request_target:',w)
        self.assertIn("default_branch || 'master'",w)
        self.assertIn('persist-credentials: false',w)
        self.assertIn('--expected-head',w)
        self.assertIn('--dry-run',w)
        self.assertNotIn('--merge',w)

if __name__=='__main__': unittest.main()
