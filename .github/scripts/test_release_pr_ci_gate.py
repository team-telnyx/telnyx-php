#!/usr/bin/env python3
"""Static contracts for DOT-2061 PHP phase 1."""
import unittest
from pathlib import Path

ROOT = Path(__file__).resolve().parents[2]


class PHPReleasePRGateTests(unittest.TestCase):
    def test_release_please_pr_runs_existing_full_jobs_without_suppressing_pushes(self):
        ci = (ROOT / ".github/workflows/ci.yml").read_text()
        self.assertEqual(ci.count("startsWith(github.head_ref, 'release-please--')"), 2)
        self.assertIn("github.event_name == 'push'", ci)
        for name in ("name: lint", "name: test"):
            self.assertIn(name, ci)

    def test_readiness_uses_trusted_default_policy_and_never_merges(self):
        workflow = (ROOT / ".github/workflows/release-pr-readiness.yml").read_text()
        self.assertIn("pull_request_target:", workflow)
        self.assertIn("ref: ${{ github.event.repository.default_branch || 'master' }}", workflow)
        self.assertIn("persist-credentials: false", workflow)
        self.assertIn("--expected-head", workflow)
        self.assertIn("--dry-run", workflow)
        self.assertNotIn("--merge", workflow)

    def test_readiness_publishes_exact_head_status_fail_closed(self):
        workflow = (ROOT / ".github/workflows/release-pr-readiness.yml").read_text()
        self.assertIn("context=release-provenance", workflow)
        self.assertIn("state=pending", workflow)
        self.assertIn("STATE=failure", workflow)
        self.assertIn('[ "$STATE" = success ]', workflow)
        self.assertIn("statuses: write", workflow)


if __name__ == "__main__":
    unittest.main()
