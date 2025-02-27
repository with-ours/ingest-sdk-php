#!/usr/bin/env bash
set -e

# 1. Show current version from composer.json (fallback to 0.0.0 if not defined)
CURRENT_VERSION=$(php -r "echo json_decode(file_get_contents('composer.json'), true)['version'] ?? '1.0.0';")
echo "Current version is: $CURRENT_VERSION"

# 2. Prompt for the next version
read -rp "Enter the next version (e.g., 1.0.1): " NEXT_VERSION

# 3. Prompt for release notes
echo "Enter release notes (press ENTER, then CTRL+D when done):"
RELEASE_NOTES=$(cat)

# 4. Update composer.json with the new version using inline PHP
php <<EOF
<?php
\$composerFile = 'composer.json';
\$data = json_decode(file_get_contents(\$composerFile), true);
\$data['version'] = '${NEXT_VERSION}';
file_put_contents(\$composerFile, json_encode(\$data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
?>
EOF

echo "Updated composer.json to version ${NEXT_VERSION}"

# 5. Update or create CHANGELOG.md
if [ ! -f CHANGELOG.md ]; then
  echo "# Changelog" > CHANGELOG.md
fi

{
  echo ""
  echo "## [${NEXT_VERSION}] - $(date +%Y-%m-%d)"
  echo ""
  echo "${RELEASE_NOTES}"
} >> CHANGELOG.md

# 6. Commit changes and create a Git tag with the release notes
git add composer.json CHANGELOG.md
git commit -m "chore: release v${NEXT_VERSION}

${RELEASE_NOTES}"
git tag -a "v${NEXT_VERSION}" -m "${RELEASE_NOTES}"

# 7. Push the commit and tag
git push origin main
git push origin "v${NEXT_VERSION}"

# 8. Packagist Reminder
echo "Release v${NEXT_VERSION} is ready!"